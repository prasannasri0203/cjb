@extends('portal.app')

@section('title', 'Merchandise Product | ')

@section('header_css')
<style type="text/css">
  .gallery-wrap .img-big-wrap img {
      height: 450px;
      width: auto;
      display: inline-block;
      cursor: zoom-in;
  }


  .gallery-wrap .img-small-wrap .item-gallery {
      width: 60px;
      height: 60px;
      border: 1px solid #ddd;
      margin: 7px 2px;
      display: inline-block;
      overflow: hidden;
  }

  .gallery-wrap .img-small-wrap {
      text-align: center;
  }
  .gallery-wrap .img-small-wrap img {
      max-width: 100%;
      max-height: 100%;
      object-fit: cover;
      border-radius: 4px;
      cursor: zoom-in;
  }
</style>
  
  <!-- end of plugin styles -->
@endsection

@section('content')

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Merchandise Product List</h2>
            </div>
          </header>
          <section>   
            <div class="container-fluid">

                
              <div class="card">
                <div class="row">
                  <aside class="col-sm-5 border-right">
              <article class="gallery-wrap"> 
              <div class="img-big-wrap">
                <div> <a href="#"><img src="{{URL::to('/portal/img/product/' . $data->image)}}" style="max-width: 100%"></a></div>
              </div> <!-- slider-product.// -->
              <div class="img-small-wrap">
                <div class="item-gallery"> <img src="{{URL::to('/portal/img/product/' . $data->image)}}"> </div>
              </div> <!-- slider-nav.// -->
              </article> <!-- gallery-wrap .end// -->
                  </aside>
                  <aside class="col-sm-7">
              <article class="card-body p-5">
                <h3 class="title mb-3">{{$data->product_name}}</h3>

              <p class="price-detail-wrap"> 
                <span class="price h3 text-warning"> 
                  <span class="currency">US $</span><span class="num">{{$data->price}}</span>
                </span> 
                <span>/per Quantity</span> 
              </p> <!-- price-detail-wrap .// -->
              <dl class="item-property">
                <dt>Description</dt>
                <dd><p>{{$data->product_description}}</p></dd>
              </dl>
              <dl class="param param-feature">
                <style type="text/css">
                  .colors{
                      display: flex;
                      flex-direction: column;
                      width: 100%;
                  }
                      .color__title{
                          line-height: 2;
                          font-size: 12px;
                          color: #868686;
                          letter-spacing: 1px;
                      }
                      .color__container{ display: flex; }
                      .color__item{
                          height: 25px;
                          width: 25px;
                          margin-right: 10px;
                          border-radius: 50%;
                          background-color: #fff;
                          border: 2px solid #000;
                      }
                </style>
                <dt>Color</dt>
                <div class="colors">
                    <div class="color__container">
                        <div class="color__item" style="background-color: {{$data->product_colour}};"></div>
                    </div>
                </div>
                <!--  -->
              </dl>  <!-- item-property-hor .// -->
              <dl class="param param-feature">
                <dt>Delivery</dt>
                <dd>USA, Greenland and Europe</dd>
              </dl>  <!-- item-property-hor .// -->

              <hr>
                <div class="row">
                  <div class="col-sm-5">
                    <dl class="param param-inline">
                      <dt>Status: </dt>
                      <dd>
                        Available
                      </dd>
                    </dl>  <!-- item-property .// -->
                  </div> <!-- col.// -->
                  <div class="col-sm-7">
                    <dl class="param param-inline">
                        <dt>Size: </dt>
                        <dd>
                          <label class="form-check form-check-inline">
                          <span class="form-check-label">SM</span>
                        </label>
                        <label class="form-check form-check-inline">
                          <span class="form-check-label">MD</span>
                        </label>
                        <label class="form-check form-check-inline">
                          <span class="form-check-label">XXL</span>
                        </label>
                        </dd>
                    </dl>  <!-- item-property .// -->
                  </div> <!-- col.// -->
                </div> <!-- row.// -->
              </article> <!-- card-body.// -->
                  </aside> <!-- col.// -->
                </div> <!-- row.// -->
              </div> <!-- card.// -->

            </div>        
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




