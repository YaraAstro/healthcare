@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Examine')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/examineStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">

        <!-- Patient Information Section -->
        <section class="patient-info">
            <h2>Patient's Information Form</h2>
            <div>
                
                <div class="form-group">
                    <label for="patient-name">Patient Name:</label>
                    <input type="text" id="patient-name" name="patient_name" value="{{ $user['name'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" name="patient_id" value="{{ $user['patient_id'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="{{ $user['age'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user['email'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="symptoms">Symptoms:</label>
                    <input type="text" id="symptoms" name="symptoms" value="{{ $user['symptoms'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="{{ $user['description'] }}" disabled>
                </div>
            </div>
        </section>

        <!-- Drag Items -->
        <form id="checkPatientForm" action="{{ route('appointment.examine.action') }}" method="POST">
            @csrf

            <input type="hidden" name="patient_id" value="{{ $user['patient_id'] }}" >
            <input type="hidden" name="doctor_id" value="{{ session('id') }}" >
            <input type="hidden" name="appo_id" value="{{ $user['id'] }}" >
            <input type="hidden" name="drug_list" id="drug_list">

            <div class="drugContent">
                <label> Prescriptions</label>
                <div id="drugCont" class="drugBox">
                    
                    <div class="drugChoose">
                        <select name="drug1" id="drug1">
                            <option value="">Select Medicine</option>
                                @foreach ($med as $drug)
                                    <option value="{{ $drug -> id }}">{{ $drug -> name }}</option>
                                @endforeach
                        </select>
                        <div class="remvBtn" onclick="removeThis(this)">&times;</div>
                    </div>
                    
                    <div class="drugChoose">
                        <select name="drug2" id="drug2">
                            <option value="">Select Medicine</option>
                                @foreach ($med as $drug)
                                    <option value="{{ $drug -> id }}">{{ $drug -> name }}</option>
                                @endforeach
                        </select>
                        <div class="remvBtn" onclick="removeThis(this)">&times;</div>
                    </div>

                    <div class="drugChoose">
                        <select name="drug3" id="drug3">
                            <option value="">Select Medicine</option>
                                @foreach ($med as $drug)
                                    <option value="{{ $drug -> id }}">{{ $drug -> name }}</option>
                                @endforeach
                        </select>
                        <div class="remvBtn" onclick="removeThis(this)">&times;</div>
                    </div>

                </div>
            </div>

            <div class="form-actions">
                <button id="addDrug" type="button">Add</button>
                <button type="submit">Submit</button>
            </div>
        </form>

    </div>
@endsection

{{-- scripts --}}
@section('scripts')
<script>
let adBtn = document.getElementById('addDrug');
let medCont = document.getElementById('drugCont');
let idVal = 3;

adBtn.addEventListener('click', () => {
    idVal++;
    let medicine = `
        <div class="drugChoose">
            <select name="drug${idVal}" id="drug${idVal}">
                <option value="">Select Medicine</option>
                    @foreach ($med as $drug)
                        <option value="{{ $drug -> id }}">{{ $drug -> name }}</option>
                    @endforeach
            </select>
            <div class="remvBtn" onclick="removeThis(this)">&times;</div>
        </div>
    `;
    medCont.innerHTML += medicine;
});

// remove medicines
function removeThis (element) {
    var parentTag = element.parentElement;
    parentTag.parentElement.removeChild(parentTag);
}

// collect medicines
document.getElementById('checkPatientForm').addEventListener('submit', (e) => {
    let allMeds = [];
    let order = document.querySelectorAll('#drugCont select');

    order.forEach(element => {
        if (element.value !== '') {
            allMeds.push(element.value);
        }
    });

    document.getElementById('drug_list').value = JSON.stringify(allMeds);
})

</script>
@endsection

