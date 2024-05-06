@section('content')

  <aside class="flex flex-col justify-evenly gap-3 col-span-3 max-h-96 bg-gray-50 p-2 m-1 border-2 border-mygray rounded-lg md:col-span-2 hidden sm:flex sticky top-20">
    <div class="border-2 border-mygray rounded-lg p-2 pt-1 pb-1 bg-beige ">
      <div class="font-semibold">Search Post</div>
      <div class="pt-2">
        <input placeholder="Post Content" id="small-input" class="block w-full p-2 text-mygray border border-gray-300 rounded-lg bg-gray-50 text-xs border-2 border-gray-900 focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div class="pt-2">
        <button type="button" class="d-dashboard__aside-btns">Search</button>
      </div>
    </div>
    <div class="border-2 border-mygray rounded-lg p-2 pt-1 pb-1 bg-beige">
      <div class="font-semibold">Suggestions</div>
      <!-- User suggest number 1 -->
      <hr class="border border-gray-600 shadow:md mt-1">
      <div class="pt-1">User 1</div>
      <div class="pt-2">
        <button type="button" class="d-dashboard__aside-btns">Follow</button>
      </div>
      <!-- User suggest number 2 -->
      <hr class="border border-gray-600 shadow:md mt-1">
      <div class="pt-1">User 1</div>
      <div class="pt-2">
        <button type="button" class="d-dashboard__aside-btns">Follow</button>
      </div>
    </div>
  </aside>
