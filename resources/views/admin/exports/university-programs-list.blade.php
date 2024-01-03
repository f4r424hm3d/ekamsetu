<table>
  <thead>
  <tr>
      <th>program_id</th>
      <th>university_id</th>
      <th>university</th>
      <th>program_name</th>
      <th>tution_fees</th>
      <th>fees_type</th>
      <th>duration</th>
      <th>scholarship_type</th>
      <th>scholarship</th>
      <th>student_type</th>
  </tr>
  </thead>
  <tbody>
  @foreach($rows as $row)
      <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->getUniversity->id }}</td>
          <td>{{ $row->getUniversity->name }}</td>
          <td>{{ $row->course_name }}</td>
          <td>{{ $row->getTutionFees->tution_fees??'' }}</td>
          <td>{{ $row->getTutionFees->fees_type??'' }}</td>
          <td>{{ $row->getTutionFees->duration??'' }}</td>
          <td>{{ $row->getTutionFees->scholarship_type??'' }}</td>
          <td>{{ $row->getTutionFees->scholarship??'' }}</td>
          <td>{{ $row->getTutionFees->student_type??'' }}</td>
      </tr>
  @endforeach
  </tbody>
</table>
