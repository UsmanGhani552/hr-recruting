<!-- resources/views/emails/submission_email.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Submission Email</title>
</head>
<body>
    <h1>Job Details</h1>
    <p>Job Title: {{ $job->title }}</p>
    <p>Department: {{ $job->department }}</p>
    <p>Internal Job Code: {{ $job->internal_job_code }}</p>
    <p>Employment type: {{ $job->employment_type }}</p>
    <p>Salary Range: {{ $job->salary_range }}</p>
    <p>Currency: {{ $job->currency }}</p>
    <p>Minimum experience: {{ $job->minimum_experience }}</p>

    <h1>Client Details</h1>
    <p>Client Name: {{ $client->name }}</p>
    <p>Website: {{ $client->website }}</p>
    <p>phone: {{ $client->phone }}</p>
    <p>email: {{ $client->email }}</p>
    <p>Company Size: {{ $client->company_size }}</p>
    <p>industry: {{ $client->industry }}</p>
    <p>Year Founded: {{ $client->year_founded }}</p>

    <h1>Vendor Details</h1>
    <p>First Name: {{ $vendor->first_name }}</p>
    <p>Last Name: {{ $vendor->last_name }}</p>
    <p>phone: {{ $vendor->phone }}</p>
    <p>email: {{ $vendor->email }}</p>
    <p>Company Name: {{ $vendor->company_name }}</p>

    <h1>Candidate Details</h1>
    <p>First Name: {{ $candidate->first_name }}</p>
    <p>Last Name: {{ $candidate->last_name }}</p>
    <p>phone: {{ $candidate->phone }}</p>
    <p>email: {{ $candidate->email }}</p>
    <p>Work Authentication: {{ $candidate->work_authorization }}</p>
    <p>Exp Pay Rate: {{ $candidate->expected_pay_rate }}</p>
    <p>Availabilty to Start: {{ $candidate->availability_to_start }}</p>
    <p>Experience: {{ $candidate->years_of_experience }}</p>
    <!-- Add more details as needed -->

    <h1>Additional Documents</h1>
    @if ($submission->additional_documents)
        @foreach(explode('|', $submission->additional_documents) as $filename)
            <img src="{{ asset('candidates/' . $filename) }}" alt="Image" width="200px" height="200px">
        @endforeach
    @endif
</body>
</html>
