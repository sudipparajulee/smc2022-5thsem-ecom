@if(Session::has('success'))
<div id="alert" class="fixed right-4 top-4 bg-green-600 text-white px-8 py-3 text-xl rounded-lg">
    {{session('success')}}
</div>
<script>
    setTimeout(() => {
        document.getElementById('alert').classList.add('hidden');
    },2000);
</script>
@endif
