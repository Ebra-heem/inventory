@foreach($subcategories as $subcategory)
@php
    $total=DB::table('ledgers')->where('chart_account_id',$subcategory->id)->sum('amount');
@endphp
 <ul>
    <li>{{$subcategory->name}} <span style="float:right;">@include('backend.chart_account.bal',['chartAccount' => $subcategory->id])</span></li> 
  @if(count($subcategory->childs))
    @include('backend.chart_account.sub_account',['subcategories' => $subcategory->childs])
  @endif
 </ul> 
@endforeach