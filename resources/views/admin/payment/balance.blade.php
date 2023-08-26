
@extends('admin._layout')
@section('content')


<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: right;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>





<h2>الاقسام</h2>

<div class="tab" >
  <button class="tablinks" onclick="openSection(event, 'pending')">قيد الانتظار</button>
  <button class="tablinks" onclick="openSection(event, 'rejected')">المرفوض</button>
  <button class="tablinks" onclick="openSection(event, 'done')">تم الاستلام</button>
  <button class="tablinks" onclick="openSection(event, 'loan')">الدين</button>
</div>

<div id="pending" class="tabcontent">
  <table class="table">
    <thead>
        <tr>
          <th>#</th>
          <th>الحساب</th>
          <th>اسم صاحب الحساب</th>
          <th>وسيلة الدفع</th>
          <th>الكمية</th>
          <th>المبلغ</th>
          <th>الحالة</th>
          <th>#</th>


          <!-- Add more header columns as needed -->
        </tr>
      </thead>
      <tbody>
        @foreach (($data['pending'] ??[]) as $index=>$item)         
        <tr>
          <td>{{$index+1}}</td>
          <td>{{$item['user']['name']}}</td>
          <td>{{$item['name']}}</td>
          <td>{{$item['payment_methods']['name']}}</td>
          <td>{{$item['balance']}}</td>          
          <td>{{$item['price']}}</td>
          <td><div class="alert alert-warning" style="text-align: center">قيد الانتظار</div></td>
          <td>
            <a onclick="check('/admin/balance/update/{{$item['id']}}/1')"  style="color: white" class="btn btn-success"> الموافقة </a>
            <a onclick="check('/admin/balance/update/{{$item['id']}}/2')" style="color: white" class="btn btn-danger"> رفض </a>
            <a onclick="check('/admin/balance/update/{{$item['id']}}/3')" style="color: white" class="btn btn-warning"> دين </a>
        </td>
        </tr> 
        @endforeach 
      </tbody>
    </table>
</div>

<div id="rejected" class="tabcontent">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>الحساب</th>
              <th>اسم صاحب الحساب</th>
              <th>وسيلة الدفع</th>
              <th>الكمية</th>
              <th>المبلغ</th>
              <th>الحالة</th>
    
              <!-- Add more header columns as needed -->
            </tr>
          </thead>
          <tbody>
            @foreach (($data['rejected'] ??[]) as $index=>$item)         
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$item['user']['name']}}</td>
              <td>{{$item['name']}}</td>
              <td>{{$item['payment_methods']['name']}}</td>
              <td>{{$item['balance']}}</td>          
              <td>{{$item['price']}}</td>
              <td><div class="alert alert-danger" style="text-align: center">مرفوض</div></td>
            </tr> 
            @endforeach 
          </tbody>
        </table>
</div>

<div id="done" class="tabcontent">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>الحساب</th>
              <th>اسم صاحب الحساب</th>
              <th>وسيلة الدفع</th>
              <th>الكمية</th>
              <th>المبلغ</th>
              <th>الحالة</th>
    
              <!-- Add more header columns as needed -->
            </tr>
          </thead>
          <tbody>
            @foreach (($data['done'] ??[]) as $index=>$item)         
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$item['user']['name']}}</td>
              <td>{{$item['name']}}</td>
              <td>{{$item['payment_methods']['name']}}</td>
              <td>{{$item['balance']}}</td>          
              <td>{{$item['price']}}</td>
              <td><div class="alert alert-success" style="text-align: center">تمت العملية</div></td>
            </tr> 
            @endforeach 
          </tbody>
        </table>
</div>
<div id="loan" class="tabcontent">
    <table class="table">
        <thead>
            <tr>
              <th>#</th>
              <th>الحساب</th>
              <th>اسم صاحب الحساب</th>
              <th>وسيلة الدفع</th>
              <th>الكمية</th>
              <th>المبلغ</th>
              <th>الحالة</th>
              <th>#</th>
    
              <!-- Add more header columns as needed -->
            </tr>
          </thead>
          <tbody>
            @foreach (($data['loan'] ??[]) as $index=>$item)         
            <tr>
              <td>{{$index+1}}</td>
              <td>{{$item['user']['name']}}</td>
              <td>{{$item['name']}}</td>
              <td>{{$item['payment_methods']['name']}}</td>
              <td>{{$item['balance']}}</td>          
              <td>{{$item['price']}}</td>
              <td><div class="alert alert-warning" style="text-align: center">دين</div></td>
              <td>
                <a onclick="check('/admin/balance/update/{{$item['id']}}/1')"  style="color: white" class="btn btn-success"> تم التسديد </a>
            </td>

            </tr> 
            @endforeach 
          </tbody>
        </table>
  </div>

<script>
    openSection(event, 'pending')
function openSection(evt, section) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(section).style.display = "block";
  evt.currentTarget.className += " active";
}
function check(direction){
    var confirmation = confirm("هل انت متاكد من هذه العملية؟");
    if(confirmation)
    window.location.href = direction
}




</script>

@endsection