
@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">

   <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-md-12">    
    <div class="card card-outline card-orange">
             <div class="card-header bg-primary">
            <h3 class="card-title"><i class="fa fa-address-book-o"></i> &nbsp;Add Inventory Item </h3>
            <div class="card-tools">
            <a href="{{url('admin/inventery')}}" class="btn btn-warning text-white btn-sm"><i class="fa fa-eye"></i>View </a>
            <a href="{{url('admin/inventery')}}" class="btn btn-warning text-white btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            
            </div>        

            
            <form id="quickForm" action="{{ route('admin.inventery.store') }}" method="POST" enctype="multipart/form-data">
               
            @csrf
              <div class="row m-2">
   
                   <div class="col-md-2">
                <div class="form-group">
                 <label>Company</label>
                  <select class="form-control @error('company') is-invalid @enderror" style="width: 100%;" id="company" name="company" value="{{old('company')}}">
                    <option value="">Select</option>
                    <option  value="1" {{ (1 == old('company')) ? 'selected' : '' }}>Rukmani</option>
                   <option  value="2" {{ (2 == old('company')) ? 'selected' : '' }}>tirupati</option>
                    
               </select>
                   @error('company')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>-->
    				@enderror
                </div>
                
            </div>
   
   
   
   
                <div class="col-md-2">
			<div class="form-group">
    		<label >Item Name</label>
        	<input type="text" class="form-control @error('item_name') is-invalid @enderror"  id="item_name" name="item_name"  placeholder="Item Name" value="{{old('item_name')}}">
			   
             @error('item_name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>  
   
   
   
		
	         <div class="col-md-2">
			<div class="form-group">
    		<label >Quantity Stock</label>
        	<input type="text" class="form-control @error('quantity_stock') is-invalid @enderror" onBlur="calculateAmount(this.value,0);" id="quantity_stock" name="quantity_stock"  placeholder="Quantity Stock" value="{{old('quantity_stock')}}">
			   
             @error('quantity_stock')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>
	         <div class="col-md-2">
			<div class="form-group">
    		<label >Amount</label>
        	<input type="text" class="form-control @error('amount') is-invalid @enderror" onBlur="calculateAmount(this.value,0);" id="amount" name="amount"  placeholder=" Amount" value="{{old('amount')}}">
			   
             @error('amount')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>
	         <div class="col-md-2">
			<div class="form-group">
    		<label>Total Amount</label>
        	<input type="text" class="form-control @error('total_amount') is-invalid @enderror" id="total_amount" name="total_amount"  placeholder="Total Amount" value="{{old('total_amount')}}">
			   
             @error('total_amount')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>
	         <div class="col-md-2">
			<div class="form-group">
    		<label >Available Stock</label>
        	<input type="text" class="form-control @error('available_stock') is-invalid @enderror" id="available_stock" name="available_stock"  placeholder="Available Stock" value="{{old('available_stock')}}">
			   
             @error('available_stock')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>
	         <div class="col-md-2">
			<div class="form-group">
    		<label >Date </label>
        	<input type="DATE" class="form-control @error('date') is-invalid @enderror" id="date" name="date"  placeholder=" Total Amount" value="{{old('Y-m-d')}}">
			   
             @error('date')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			 @enderror

		    </div>
		</div>
		
	    
 
               <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary ">submit</button><br><br>
               </div>
    </form>
        </div>
</div>
</div>
</div>
</section>
    
</div>



<script>
    
 function calculateAmount(value) {
       
        var quantity_stock = $('#quantity_stock').val();
        var amount = $('#amount').val();
    
        var totalAmount = quantity_stock * amount;
    
        $('#total_amount').val(totalAmount);
        
    };    
    
</script>

@endsection      




