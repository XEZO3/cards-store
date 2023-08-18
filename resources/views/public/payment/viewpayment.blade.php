@extends('public._layout')
@section('content')
<style>
    th,td{
    width:50%;padding:0.75rem;vertical-align:top;border-top:1px solid #dee2e6;text-align:right
        }
    </style>
    <div style="
        width:100%;
        position: relative;
        height: fit-content;
        border: 1px solid rgba(0,0,0,.125);
        text-align: right;
        border-radius: 5px;
        font-family:tahoma;
    ">
    <div style="
        border: 1px solid rgba(0,0,0,.125);
        height: 50px;
        background-color: #edeaea;
        padding: 0px 7px;text-align:center;
    ">معلومات الدفعة 1</div>
        <div style="
        direction: rtl;
        padding: 1.25rem;
    ">
            <table style="width:100%;max-width:100%;margin-bottom:1rem; background-color:transparent;border-collapse:collapse">
            <tbody>
                <tr>
                    <th><strong>رقم الدفعة: </strong></th>
                    <th style="font-weight:normal">{{$balance['id']}}</th>
                </tr>
                <tr>
                    <th><strong>الحالة: </strong></th>
                    @if($balance['state']=="pending")
                    <th><span style="cursor:pointer;color:#212529;background-color:#ffc107;border-color:#ffc107;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">بانتظار <i class="fa-solid fa-clock" style="color: #ffffff;"></i></span></th>
                    @elseif($balance['state']=="done")
                    <th><span style="cursor:pointer;color:#fff;background-color:#28a745;border-color:#28a745;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">تمت <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i></span></th>
                    @elseif($balance['state']=="loan")
                    <th><span style="cursor:pointer;color:#fff;background-color:#28a745;border-color:#28a745;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">دين <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i></span></th>
                    @else
                    <th><span style="cursor:pointer;color:#fff;background-color:#dc3545;border-color:#dc3545;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">مرفوضة <i class="fa fa-circle-xmark" style="color: #ffffff;"></i></span></th>
                    @endif
                </tr>
                <!--waiting:
                <tr>
                    <th><strong>الحالة: </strong></th>
                    <th><span style="cursor:pointer;color:#212529;background-color:#ffc107;border-color:#ffc107;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">بانتظار <i class="fa-solid fa-clock" style="color: #ffffff;"></i></span></th>
                </tr>
    
                end-->
                <!--success:
                <tr>
                    <th><strong>الحالة: </strong></th>
                    <th><span style="cursor:pointer;color:#fff;background-color:#28a745;border-color:#28a745;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;">تمت <i class="fa-solid fa-circle-check" style="color: #ffffff;"></i></span></th>
                </tr>
    
                end-->
                <tr>
                    <th><strong>المبلغ المطلوب:<button title="يرجى ارسال المبلغ الموضح بدون زيادة او نقصان حتى تتم معالجة دفعتكم بشكل سريع" style="background-color: transparent;border: none;color: #007bff;cursor:pointer;"><i class="fa-solid fa-circle-info"></i></button></strong></th>
                    <th style="font-weight:normal;color: #007bff;">{{$balance['price']}}</th>
                </tr>
                <tr>
                    <th><strong>قيمة الرصيد المضاف:  </strong></th>
                    <th style="font-weight:normal;color: #007bff;">{{$balance['balance']}}</th>
                </tr>
                <tr>
                    <th><strong>بوابة الدفع: </strong></th>
                    <th style="font-weight:normal">{{$balance['payment_methods']['name']}}</th>
                </tr>
                <tr>
                    <th><strong>عنوان المحفظة<button title="هذا اسم الشخص الذي يجب تحويل المال الى حسابه" style="background-color: transparent;border: none;color: #007bff;cursor:pointer;"><i class="fa-solid fa-circle-info"></i></button></strong></th>
                    <th style="font-weight:normal">{{$balance['payment_methods']['wallet']}}</th>
                </tr>
                <tr>
                    <th><strong>تاريخ الإنشاء: </strong></th>
                    <th style="font-weight:normal">{{$balance['created_at']}}</th>
                </tr>
                <tr>
                    <th><strong>ملاحظات: </strong></th>
                    <th style="font-weight:normal">{{$balance['note']}}</th>
                </tr>
                </tbody>
            </table>
            </div>
    </div>
@endsection