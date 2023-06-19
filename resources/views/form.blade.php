<!-- form.blade.php -->



<h2>Name: {{ $patient->name }}</h2>
<p>Email: {{ $patient->email }}</p>

<!-- Display CT Scan -->
@if ($ctscans->isNotEmpty())
<h3>CT Scan</h3>

@foreach ($ctscans as $ctscan)
<p>{{ $ctscan->name }}</p>

@endforeach
@endif

<br>
@if ($xrays->isNotEmpty())
<h3>X-Rays</h3>

@foreach ($xrays as $xray)
<p>{{ $xray->property }}</p>
@endforeach
@endif
<br>



@if ($mris->isNotEmpty())
<h3>MRI Scans</h3>

@foreach ($mris as $mri)
<p>{{ $mri->property }}</p>
@endforeach
@endif


<br>
@if ($ultrasoundScans->isNotEmpty())
<h3>Ultrasound Scans</h3>


<br>
@foreach ($ultrasoundScans as $ultrasoundScan)
<p>{{ $ultrasoundScan->property }}</p>
@endforeach
@endif