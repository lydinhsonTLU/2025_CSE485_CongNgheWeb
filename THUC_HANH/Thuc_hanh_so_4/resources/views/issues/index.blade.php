<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Quản lý vấn đề</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý <strong>Vấn đề</strong></h5>
            <a href="{{ route('issues.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Thêm vấn đề
            </a>
        </div>

        <div class="card-body">

            {{-- Thông báo --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-secondary">
                    <tr>
                        <th>Mã</th>
                        <th>Tên máy</th>
                        <th>Phiên bản</th>
                        <th>Người báo cáo</th>
                        <th>Thời gian</th>
                        <th>Mức độ</th>
                        <th>Trạng thái</th>
                        <th width="120">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($issues as $issue)
                        <tr>
                            <td>#{{ $issue->id }}</td>
                            <td>{{ $issue->computer->computer_name }}</td>
                            <td>{{ $issue->computer->model }}</td>
                            <td>{{ $issue->reported_by ?? '—' }}</td>
                            <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d/m/Y H:i') }}</td>
                            <td>
                                    <span class="badge
                                        {{ $issue->urgency === 'High' ? 'bg-danger' :
                                           ($issue->urgency === 'Medium' ? 'bg-warning text-dark' : 'bg-info') }}">
                                        {{ $issue->urgency }}
                                    </span>
                            </td>
                            <td>
                                    <span class="badge
                                        {{ $issue->status === 'Resolved' ? 'bg-success' :
                                           ($issue->status === 'In Progress' ? 'bg-primary' : 'bg-secondary') }}">
                                        {{ $issue->status }}
                                    </span>
                            </td>
                            <td>
                                <a href="{{ route('issues.edit', $issue->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <button class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $issue->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>

                                <!-- Modal xóa -->
                                <div class="modal fade" id="deleteModal{{ $issue->id }}">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Bạn có chắc muốn xóa vấn đề <strong>#{{ $issue->id }}</strong>?
                                                <p class="text-danger mt-2 mb-0">
                                                    <small>Hành động này không thể hoàn tác.</small>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form method="POST" action="{{ route('issues.destroy', $issue->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted">Không có dữ liệu</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Phân trang --}}
            <div class="clearfix"> <div class="hint-text">Hiển thị <b>{{ $issues->count() }}</b> trên <b>{{ $issues->total() }}</b> bản ghi</div> {{ $issues->links('pagination::bootstrap-4') }} </div> </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
