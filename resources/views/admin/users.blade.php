@extends('admin._layout')
@section('content')
<style>
     .modal-backdrop {
 
  
 z-index: -1;
}
</style>
<div class="container-fluid" style="overflow-x: scroll">
        @csrf <!-- Laravel CSRF token -->

        <table class="table" style="overflow-x: scroll;min-width:1000px">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">الرصيد</th>
                    <th scope="col">تحرير / حفظ / إلغاء / حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $item)
                    <tr>
                        <form method="POST" action="/admin/users/edit/{{$item['id']}}">
                            @csrf
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <input type="text" class="form-control" name="name" value="{{ $item['name'] }}" readonly>
                        </td>
                        <td>
                            <input type="email" class="form-control" name="email" value="{{ $item['email'] }}" readonly>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="balance" value="{{ $item['balance'] }}" readonly>
                        </td>

                        <td>
                            <input type="password" class="form-control" name="password" placeholder="تغيير كلمة المرور" readonly>
                        </td>
                        
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary edit-user" data-index="{{ $index }}">
                                    تحرير
                                </button>
                                <button type="submit" class="btn btn-success save-user" data-index="{{ $index }}"
                                    style="display: none;">
                                    حفظ
                                </button>
                                <button type="button" class="btn btn-secondary cancel-edit" data-index="{{ $index }}"
                                    style="display: none;">
                                    إلغاء
                                </button>
                                
                                    <a href="/admin/users/delete/{{ $item['id'] }}" class="btn btn-danger">
                                        حذف
                                    </a>
                              
                            </div>
                        </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal">
            إنشاء مستخدم جديد
        </button>
        
        <!-- User Creation Modal -->
        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">إنشاء مستخدم جديد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createUserForm" method="POST" action="/admin/users/add">
                        @csrf
                        <div class="modal-body">
                            <!-- User creation form fields go here -->
                            <div class="form-group">
                                <label for="newUserName">الاسم</label>
                                <input type="text" class="form-control" id="newUserName" name="name" required>
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newUserEmail">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="newUserEmail" name="email" required>
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newUserBalance">الرصيد</label>
                                <input type="text" class="form-control" id="newUserBalance" name="balance" required>
                                @error('balance')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newUserBalance">رقم الهاتف</label>
                                <input type="text" class="form-control" id="newUserBalance" name="phone_number" required>
                                @error('phone_number')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newUserPassword">كلمة المرور</label>
                                <input type="password" class="form-control" id="newUserPassword" name="password" required>
                                @error('password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="newUserPassword">كلمة المرور</label>
                                <input type="password" class="form-control" id="newUserPassword" name="password_confirmation" required>
                                @error('password_confirmation')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-primary">إنشاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-user");
    const saveButtons = document.querySelectorAll(".save-user");
    const cancelButtons = document.querySelectorAll(".cancel-edit");
    const nameInputs = document.querySelectorAll("input[name='name']");
    const emailInputs = document.querySelectorAll("input[name='email']");
    const balanceInputs = document.querySelectorAll("input[name='balance']");
    const passwordInputs = document.querySelectorAll("input[name='password']");
    const saveChangesButton = document.querySelector(".btn-success");
    const cancelButton = document.querySelector(".btn-secondary");

    editButtons.forEach((editButton, index) => {
        editButton.addEventListener("click", function () {
            editButton.style.display = "none";
            saveButtons[index].style.display = "block";
            cancelButtons[index].style.display = "block";
            nameInputs[index].readOnly = false;
            passwordInputs[index].readOnly = false;
            emailInputs[index].readOnly = false;
            balanceInputs[index].readOnly = false;
            saveChangesButton.style.display = "block";
            cancelButton.style.display = "block";
        });

        saveButtons[index].addEventListener("click", function () {
            editButtons[index].style.display = "block";
            saveButtons[index].style.display = "none";
            cancelButtons[index].style.display = "none";
            nameInputs[index].readOnly = true;
            passwordInputs[index].readOnly = true;
            emailInputs[index].readOnly = true;
            balanceInputs[index].readOnly = true;
        });

        cancelButtons[index].addEventListener("click", function () {
            editButtons[index].style.display = "block";
            saveButtons[index].style.display = "none";
            cancelButtons[index].style.display = "none";
            nameInputs[index].readOnly = true;
            emailInputs[index].readOnly = true;
            passwordInputs[index].readOnly = true;
            balanceInputs[index].readOnly = true;
        });
    });

    cancelButton.addEventListener("click", function () {
        editButtons.forEach((editButton, index) => {
            editButton.style.display = "block";
            saveButtons[index].style.display = "none";
            cancelButtons[index].style.display = "none";
            nameInputs[index].readOnly = true;
            emailInputs[index].readOnly = true;
            passwordInputs[index].readOnly = true;
            balanceInputs[index].readOnly = true;
        });
        saveChangesButton.style.display = "none";
        cancelButton.style.display = "none";
    });
        // Submit the form when the "حفظ الإتغييرات" button is clicked
      
    });
</script>

@endsection
