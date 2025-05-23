<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Kwitansi Gaji</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      border-bottom: 2px solid #000;
      padding-bottom: 10px;
    }

    .company-name {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .document-title {
      font-size: 18px;
      margin-bottom: 5px;
    }

    .content {
      margin-bottom: 30px;
    }

    .info-row {
      margin-bottom: 10px;
    }

    .label {
      font-weight: bold;
      display: inline-block;
      width: 150px;
    }

    .salary-details {
      margin: 20px 0;
      border: 1px solid #000;
      padding: 15px;
    }

    .total {
      text-align: right;
      margin-top: 20px;
      font-weight: bold;
    }

    .footer {
      margin-top: 50px;
      display: flex;
      justify-content: space-between;
    }

    .signature {
      text-align: center;
      width: 200px;
    }

    .signature-line {
      border-top: 1px solid #000;
      margin-top: 50px;
      padding-top: 5px;
    }
  </style>
</head>

<body>
  <div class="header">
    <div class="company-name">PT. Karya Langit Abadi</div>
    <div class="document-title">KWITANSI PEMBAYARAN GAJI</div>
  </div>

  <div class="content">
    <div class="info-row">
      <span class="label">No. Kwitansi:</span>
      <span>KW/{{ $gaji->id }}/{{ date('Y/m') }}</span>
    </div>
    <div class="info-row">
      <span class="label">Tanggal:</span>
      <span>{{ date('d F Y') }}</span>
    </div>
    <div class="info-row">
      <span class="label">Nama Karyawan:</span>
      <span>{{ $gaji->datakaryawan->nama }}</span>
    </div>
    <div class="info-row">
      <span class="label">NIK:</span>
      <span>{{ $gaji->datakaryawan->nik }}</span>
    </div>
    <div class="info-row">
      <span class="label">Jabatan:</span>
      <span>{{ $gaji->datakaryawan->jabatan }}</span>
    </div>
    <div class="info-row">
      <span class="label">Periode:</span>
      <span>{{ \Carbon\Carbon::parse($gaji->bulan)->format('F Y') }}</span>
    </div>
  </div>

  <div class="salary-details">
    <div class="info-row">
      <span class="label">Gaji Pokok:</span>
      <span>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</span>
    </div>
    <div class="info-row">
      <span class="label">Tunjangan:</span>
      <span>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</span>
    </div>
    <div class="info-row">
      <span class="label">Potongan:</span>
      <span>Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</span>
    </div>
    <div class="total">
      Total Gaji: Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}
    </div>
  </div>

  <div class="footer">
    <div class="signature">
      <div>Diterima oleh,</div>
      <div class="signature-line">{{ $gaji->datakaryawan->nama }}</div>
    </div>
    <div class="signature">
      <div>Dibayarkan oleh,</div>
      <div class="signature-line">Admin Keuangan</div>
    </div>
  </div>
</body>

</html>