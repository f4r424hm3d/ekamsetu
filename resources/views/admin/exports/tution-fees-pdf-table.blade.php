<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>T{{ ucwords(strtolower($fees[0]->student_type)) }} Student Tution Fees</title>
  <style>
    .page-break {
      page-break-after: always;
    }

    .float-right {
      float: right;
    }

    .fw1 {
      font-weight: 500;
    }

    .fs1 {
      font-size: 15px;
    }

    .fw2 {
      font-weight: 200;
    }

    .fs2 {
      font-size: 12px;
    }

    .card {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #f9efe1;
      background-clip: border-box;
      border: 1px solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card>hr {
      margin-right: 0;
      margin-left: 0
    }

    .card>.list-group:first-child .list-group-item:first-child {
      border-top-left-radius: .25rem;
      border-top-right-radius: .25rem
    }

    .card>.list-group:last-child .list-group-item:last-child {
      border-bottom-right-radius: .25rem;
      border-bottom-left-radius: .25rem
    }

    .card-body {
      -ms-flex: 1 1 auto;
      flex: 1 1 auto;
      padding: 1.25rem;
      background-color: #fff;
    }

    .card-title {
      margin-bottom: .75rem
    }

    .card-subtitle {
      margin-top: -.375rem;
      margin-bottom: 0
    }

    .card-text:last-child {
      margin-bottom: 0
    }

    .card-link:hover {
      text-decoration: none
    }

    .card-link+.card-link {
      margin-left: 1.25rem
    }

    .card-header {
      padding: .75rem 1.25rem;
      margin-bottom: 0;
      background-color: rgba(0, 0, 0, .03);
      border-bottom: 1px solid rgba(0, 0, 0, .125)
    }

    .card-header:first-child {
      border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
    }

    .card-header+.list-group .list-group-item:first-child {
      border-top: 0
    }

    .card-footer {
      padding: .75rem 1.25rem;
      background-color: rgba(0, 0, 0, .03);
      border-top: 1px solid rgba(0, 0, 0, .125)
    }

    .card-footer:last-child {
      border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
    }

    .card-header-tabs {
      margin-right: -.625rem;
      margin-bottom: -.75rem;
      margin-left: -.625rem;
      border-bottom: 0
    }

    .card-header-pills {
      margin-right: -.625rem;
      margin-left: -.625rem
    }

    .card-img-overlay {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1.25rem
    }

    .card-img {
      width: 100%;
      border-radius: calc(.25rem - 1px)
    }

    .card-img-top {
      width: 100%;
      border-top-left-radius: calc(.25rem - 1px);
      border-top-right-radius: calc(.25rem - 1px)
    }

    .card-img-bottom {
      width: 100%;
      border-bottom-right-radius: calc(.25rem - 1px);
      border-bottom-left-radius: calc(.25rem - 1px)
    }

    .card-deck {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column
    }

    .card-deck .card {
      margin-bottom: 15px
    }

    @media (min-width: 576px) {
      .card-deck {
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        margin-right: -15px;
        margin-left: -15px
      }

      .card-deck .card {
        display: -ms-flexbox;
        display: flex;
        -ms-flex: 1 0 0%;
        flex: 1 0 0%;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-right: 15px;
        margin-bottom: 0;
        margin-left: 15px
      }
    }

    .card-group {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column
    }

    .card-group>.card {
      margin-bottom: 15px
    }

    @media (min-width: 576px) {
      .card-group {
        -ms-flex-flow: row wrap;
        flex-flow: row wrap
      }

      .card-group>.card {
        -ms-flex: 1 0 0%;
        flex: 1 0 0%;
        margin-bottom: 0
      }

      .card-group>.card+.card {
        margin-left: 0;
        border-left: 0
      }

      .card-group>.card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
      }

      .card-group>.card:not(:last-child) .card-header,
      .card-group>.card:not(:last-child) .card-img-top {
        border-top-right-radius: 0
      }

      .card-group>.card:not(:last-child) .card-footer,
      .card-group>.card:not(:last-child) .card-img-bottom {
        border-bottom-right-radius: 0
      }

      .card-group>.card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0
      }

      .card-group>.card:not(:first-child) .card-header,
      .card-group>.card:not(:first-child) .card-img-top {
        border-top-left-radius: 0
      }

      .card-group>.card:not(:first-child) .card-footer,
      .card-group>.card:not(:first-child) .card-img-bottom {
        border-bottom-left-radius: 0
      }
    }

    .card-columns .card {
      margin-bottom: .75rem
    }

    @media (min-width: 576px) {
      .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-gap: 1.25rem;
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem;
        orphans: 1;
        widows: 1
      }

      .card-columns .card {
        display: inline-block;
        width: 100%
      }
    }

    .accordion>.card {
      overflow: hidden
    }

    .accordion>.card:not(:first-of-type) .card-header:first-child {
      border-radius: 0
    }

    .accordion>.card:not(:first-of-type):not(:last-of-type) {
      border-bottom: 0;
      border-radius: 0
    }

    .accordion>.card:first-of-type {
      border-bottom: 0;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0
    }

    .accordion>.card:last-of-type {
      border-top-left-radius: 0;
      border-top-right-radius: 0
    }

    .accordion>.card .card-header {
      margin-bottom: -1px
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529;
    }

    table {
      border-collapse: collapse;
      display: table;
      border-collapse: separate;
      box-sizing: border-box;
      text-indent: initial;
      border-spacing: 2px;
      border-color: gray;
    }

    table,
    ::after,
    ::before {
      box-sizing: border-box;
    }

    .table {
      width: 100%;
      margin-bottom: 1rem;
      color: #212529
    }

    .table td,
    .table th {
      padding: .75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6
    }

    .table tbody+tbody {
      border-top: 2px solid #dee2e6
    }

    .table-sm td,
    .table-sm th {
      padding: .2rem
    }

    .table-xs td,
    .table-xs th {
      padding: .1rem
    }

    .table-bordered {
      border: 1px solid #dee2e6
    }

    .table-bordered td,
    .table-bordered th {
      border: 1px solid #dee2e6
    }

    .table-bordered thead td,
    .table-bordered thead th {
      border-bottom-width: 2px
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
      border: 0
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0, 0, 0, .05)
    }

    .table-hover tbody tr:hover {
      color: #212529;
      background-color: rgba(0, 0, 0, .075)
    }

    .table-primary,
    .table-primary>td,
    .table-primary>th {
      background-color: #b8daff
    }

    .table-primary tbody+tbody,
    .table-primary td,
    .table-primary th,
    .table-primary thead th {
      border-color: #7abaff
    }

    .table-hover .table-primary:hover {
      background-color: #9fcdff
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
      background-color: #9fcdff
    }

    .table-secondary,
    .table-secondary>td,
    .table-secondary>th {
      background-color: #d6d8db
    }

    .table-secondary tbody+tbody,
    .table-secondary td,
    .table-secondary th,
    .table-secondary thead th {
      border-color: #b3b7bb
    }

    .table-hover .table-secondary:hover {
      background-color: #c8cbcf
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
      background-color: #c8cbcf
    }

    .table-success,
    .table-success>td,
    .table-success>th {
      background-color: #c3e6cb
    }

    .table-success tbody+tbody,
    .table-success td,
    .table-success th,
    .table-success thead th {
      border-color: #8fd19e
    }

    .table-hover .table-success:hover {
      background-color: #b1dfbb
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
      background-color: #b1dfbb
    }

    .table-info,
    .table-info>td,
    .table-info>th {
      background-color: #bee5eb
    }

    .table-info tbody+tbody,
    .table-info td,
    .table-info th,
    .table-info thead th {
      border-color: #86cfda
    }

    .table-hover .table-info:hover {
      background-color: #abdde5
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
      background-color: #abdde5
    }

    .table-warning,
    .table-warning>td,
    .table-warning>th {
      background-color: #ffeeba
    }

    .table-warning tbody+tbody,
    .table-warning td,
    .table-warning th,
    .table-warning thead th {
      border-color: #ffdf7e
    }

    .table-hover .table-warning:hover {
      background-color: #ffe8a1
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
      background-color: #ffe8a1
    }

    .table-danger,
    .table-danger>td,
    .table-danger>th {
      background-color: #f5c6cb
    }

    .table-danger tbody+tbody,
    .table-danger td,
    .table-danger th,
    .table-danger thead th {
      border-color: #ed969e
    }

    .table-hover .table-danger:hover {
      background-color: #f1b0b7
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
      background-color: #f1b0b7
    }

    .table-light,
    .table-light>td,
    .table-light>th {
      background-color: #fdfdfe
    }

    .table-light tbody+tbody,
    .table-light td,
    .table-light th,
    .table-light thead th {
      border-color: #fbfcfc
    }

    .table-hover .table-light:hover {
      background-color: #ececf6
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
      background-color: #ececf6
    }

    .table-dark,
    .table-dark>td,
    .table-dark>th {
      background-color: #c6c8ca
    }

    .table-dark tbody+tbody,
    .table-dark td,
    .table-dark th,
    .table-dark thead th {
      border-color: #95999c
    }

    .table-hover .table-dark:hover {
      background-color: #b9bbbe
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
      background-color: #b9bbbe
    }

    .table-active,
    .table-active>td,
    .table-active>th {
      background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover {
      background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
      background-color: rgba(0, 0, 0, .075)
    }

    .table .thead-dark th {
      color: #fff;
      background-color: #343a40;
      border-color: #454d55
    }

    .table .thead-light th {
      color: #495057;
      background-color: #e9ecef;
      border-color: #dee2e6
    }

    .table-dark {
      color: #fff;
      background-color: #343a40
    }

    .table-dark td,
    .table-dark th,
    .table-dark thead th {
      border-color: #454d55
    }

    .table-dark.table-bordered {
      border: 0
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(255, 255, 255, .05)
    }

    .table-dark.table-hover tbody tr:hover {
      color: #fff;
      background-color: rgba(255, 255, 255, .075)
    }

    @media (max-width: 575.98px) {
      .table-responsive-sm {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
      }

      .table-responsive-sm>.table-bordered {
        border: 0
      }
    }

    @media (max-width: 767.98px) {
      .table-responsive-md {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
      }

      .table-responsive-md>.table-bordered {
        border: 0
      }
    }

    @media (max-width: 991.98px) {
      .table-responsive-lg {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
      }

      .table-responsive-lg>.table-bordered {
        border: 0
      }
    }

    @media (max-width: 1199.98px) {
      .table-responsive-xl {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
      }

      .table-responsive-xl>.table-bordered {
        border: 0
      }
    }

    .table-responsive {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch
    }

    .table-responsive>.table-bordered {
      border: 0
    }

    .td1 {
      color: #7e0505
    }
  </style>

</head>

<body>
  <div class="container-fluid">
    <div>
      <center>
        <h3 class="main-heading">{{ ucwords(strtolower($fees[0]->student_type)) }} Student Tution Fees</h3>
      </center>
    </div>
    <br>

    <div>
      <table class="table table-xs table-striped">
        <thead>
          <tr>
            <th>S.N.</th>
            <th>University</th>
            <th>Program</th>
            <th>Fees Type</th>
            <th>Tution Fees</th>
            <th>Scholarship</th>
            <th>Total Tution Fees</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 1;
          @endphp
          @foreach ($fees as $row)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $row->getUniversity->name }}</td>
              <td>{{ $row->getProgram->course_name }}</td>
              <td>{{ $row->fees_type }} {{ $row->fees_type != 'total' ? '(' . $row->duration . ')' : '' }}</td>
              @if ($row->fees_type == 'total')
                <td>
                  {{ number_format($row->tution_fees, 0) }}
                </td>
              @else
                <td>
                  {{ $row->duration }} x {{ number_format($row->tution_fees, 0) }}
                </td>
              @endif
              <td>
                @if ($row->scholarship != null || $row->scholarship != 0)
                  @if ($row->scholarship_type == 'AMOUNT')
                    {{ $row->scholarship != null || $row->scholarship != 0 ? $row->scholarship : 'N/A' }}
                  @else
                    {{ $row->scholarship != null || $row->scholarship != 0 ? $row->scholarship . ' %' : 'N/A' }}
                  @endif
                @endif
                </>
              <td>{{ calc_final_fees($row->duration, $row->tution_fees, $row->scholarship, $row->scholarship_type) }}
              </td>
            </tr>
            @php
              $i++;
            @endphp
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>
