<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Total Dokumen dibuat</h5>
                        <a href="https://drive.google.com/drive/folders/1H_Ki52kX3Z3neamiH8X4Z_G-sROxKUHu?usp=sharing" target="_blank" class="btn btn-xs btn-outline-info">
                            Arsip FORPI
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2">{{ $data['total_entry'] }}</h2>
                            <span>Dokumen SKPI</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <a href="">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-check-circle "></i></span>
                                </div>
                            </a>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Sudah Mengisi</h6>
                                    <small class="text-muted"><i>{{ $data['update_isset_' . request()->segment(1)] }}</i></small>

                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ $data['total_mahasiswa_isset_pisn'] }}</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <a href="">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-time"></i></span>
                                </div>
                            </a>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Belum Mengisi</h6>
                                    <small class="text-muted">{{ $data['update_noset_' . request()->segment(1)] }}</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">{{ $data['total_mahasiswa_noset_pisn'] }}</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-lg-8 col-xl-8 order-0 mb-4">
            <div class="card h-100">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">Laporan Pengisian {{ strtoupper(request()->segment(1)) }}</h5>
                        <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                            <div id="chartLogbook"></div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 511px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ $data['menuData']['periode_lulus'] }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart" style="min-height: 154.875px;">
                            <div id="gaugeTransaksi"></div>
                        </div>
                        <div class="text-center fw-semibold pt-3 mb-2">Prodi Pengisi {{ strtoupper(request()->segment(1)) }}</div>
                        <div class="text-center mb-2 px-3">
                            @foreach ($data['prodi_mahasiswa'] as $prodi => $total_prodi)
                                @php
                                    $color = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info'])->random();
                                @endphp
                                <div class="d-flex align-items-center mb-1">
                                    <span class="badge {{ 'bg-label-' . $color }}">{{ $prodi }}</span>
                                    <div class="flex-grow-1 border-bottom mx-2"></div>
                                    <span class="badge {{ 'bg-label-' . $color }}">{{ $total_prodi }}</span>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-backdrop fade"></div>
