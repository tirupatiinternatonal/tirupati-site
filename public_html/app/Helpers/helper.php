<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Session;
use File;

class Helper{

    public static function sendMail($template,$data){

        Mail::send($template, $data, function($message) use ($data){

            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($data['email']);
            $message->subject($data['subject']);

            if(!empty($data['files'])){
                $message->attach($data['files']);
            }

        });

    }


    public static function sendWhatsappMessage($toMobile,$text,$filepath=null,$filename=null){

        if(!empty($toMobile)){

            $sendRequest ='sendText';
            $getData = 'phone=91'.$toMobile;

            if(!empty($filepath)){
                $sendRequest ='sendFileWithCaption';
                $getData.='&link='.$filepath;
            }

            if(!empty($text)){
                $getData.='&message='.urlencode($text);
            }

            $serverUrl="https://wasmsapi.com/api/";
            $url=$serverUrl.$sendRequest."?token=".'clxrklk8q32xv10wy2rm9dj6q'."&".$getData;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

            $output = curl_exec($ch);

            curl_close($ch);

            return $output;
        }

    }


    public static function bannerimg(){

        $currentUrl = request()->path();

        $bannerdb = DB::table('page_img')
            ->join('page','page_img.page_id','=','page.id')
            ->join('page_name','page.page','=','page_name.id')
            ->select(
                'page_name.route as route',
                'page.title as title',
                'page.subtitle as subtitle',
                'page_img.bgimg as bgimg'
            )
            ->where('page_name.route',$currentUrl)
            ->first();


        // default values
        $title = '';
        $subtitle = '';
        $bgimg = 'dummybg.jpg';


        if($bannerdb){

            $title = $bannerdb->title ?? '';
            $subtitle = $bannerdb->subtitle ?? '';
            $bgimg = $bannerdb->bgimg ?? 'dummybg.jpg';

        }


        if($currentUrl == 'faq-details'){

            $modid = request('mod');
            $tmod = DB::table('routes')->where('id',$modid)->first();

            if($tmod){
                $title = $tmod->page_name;
            }

        }


        if($currentUrl == 'career-jd'){

            $cid = request('id');
            $cjd = DB::table('career_jd')->where('id',$cid)->first();

            if($cjd){
                $subtitle = $cjd->post;
            }

        }


        $bnrbg = "<section class='page-header about-page-header text-start'>";

        $bnrbg .= "<div class='page-header__bg' style='background-image:url(" 
        . env('IMAGE_SHOW_PATH') . "image/pageimg/" . $bgimg . ");'></div>";

        $bnrbg .= "<div class='wow fadeInUp titlebox'>";
        $bnrbg .= "<div class='page-header__title'>";
        $bnrbg .= "<h3>".$title."</h3>";
        $bnrbg .= "<h2>".$subtitle."</h2>";
        $bnrbg .= "</div></div>";

        $bnrbg .= "<div class='area'><ul class='circles'>
        <li></li><li></li><li></li><li></li><li></li>
        <li></li><li></li><li></li><li></li><li></li>
        </ul></div></section>";

        return $bnrbg;

    }

}