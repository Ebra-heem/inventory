@foreach($subcategories as $subcategory)
 <ul>
  <li><option value="{{$subcategory->id}}">--{{$subcategory->name}}</option></li> 
  @if(count($subcategory->childs))
    @include('backend.chart_account.sub_option',['subcategories' => $subcategory->childs])
  @endif
 </ul> 
@endforeach