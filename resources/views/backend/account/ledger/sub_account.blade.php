@foreach($subcategories as $subcategory)

 <ul>
    <li>{{$subcategory->account_name}} <span style="float:right;"></span></li> 
  @if(count($subcategory->chart))
    @include('backend.account.ledger.sub_account',['subcategories' => $subcategory->chart])
  @endif
 </ul> 
@endforeach