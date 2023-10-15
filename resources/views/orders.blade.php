<div>
    <form method="post" action="{{config('constants.EXPORT_ORDER_DOCX')}}">
        @csrf
        <button name="id" value="1" type="submit">export</button>
    </form>
</div>
