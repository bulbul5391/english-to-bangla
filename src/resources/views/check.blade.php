<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="flex flex-col justify-center items-center mt-10">
    <p class="text-green-700 text-3xl mb-8">
        Check English to Bangla Translate
    </p>
    <form method="post" action="{{route('en-to-bn')}}" class="w-3/5">
        @csrf
        <div class="grid grid-cols-2 gap-4 justify-center">
            <div>
                <label for="info" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input (Number/Day/Month)</label>
                <input type="text" name="userEntry" value="{{$formVal['userEntry'] ?? ''}}" id="info" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="12/Friday/Fri/January/Jan/am/pm" required>
            </div>
            <div>
                <label for="forConvert" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Convert For</label>
                {{ Form::select('forConvert', ['Select'=>'Select','en'=>'en','word'=>'word','w'=>'w','money'=>'money','m'=>'m','comma'=>'comma','c'=>'c'], $formVal['forConvert'] ?? '', ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
            </div>
        </div>
        <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
   <div class="text-violet-600 font-bold text-3xl mb-8">
       Output : {{ $data ?? '' }}
   </div>
</div>

</body>
</html>
