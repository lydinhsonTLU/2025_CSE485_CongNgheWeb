
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm vấn đề mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Thêm vấn đề mới</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('issues.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="computer_id">Máy tính <span class="text-danger">*</span></label>
                    <select name="computer_id" id="computer_id" class="form-control @error('computer_id') is-invalid @enderror" required>
                        <option value="">-- Chọn máy tính --</option>
                        @foreach($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                {{ $computer->computer_name }} - {{ $computer->model }}
                            </option>
                        @endforeach
                    </select>
                    @error('computer_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reported_by">Người báo cáo <span class="text-danger">*</span></label>
                    <input type="text" name="reported_by" id="reported_by" 
                           class="form-control @error('reported_by') is-invalid @enderror" 
                           value="{{ old('reported_by') }}" required>
                    @error('reported_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reported_date">Thời gian báo cáo <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="reported_date" id="reported_date" 
                           class="form-control @error('reported_date') is-invalid @enderror" 
                           value="{{ old('reported_date', now()->format('Y-m-d\TH:i')) }}" required>
                    @error('reported_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sự cố <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" 
                              class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urgency">Mức độ sự cố <span class="text-danger">*</span></label>
                    <select name="urgency" id="urgency" class="form-control @error('urgency') is-invalid @enderror" required>
                        <option value="">-- Chọn mức độ --</option>
                        <option value="Low" {{ old('urgency') == 'Low' ? 'selected' : '' }}>Thấp</option>
                        <option value="Medium" {{ old('urgency') == 'Medium' ? 'selected' : '' }}>Trung bình</option>
                        <option value="High" {{ old('urgency') == 'High' ? 'selected' : '' }}>Cao</option>
                    </select>
                    @error('urgency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                        <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Mở</option>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>Đang xử lý</option>
                        <option value="Resolved" {{ old('status') == 'Resolved' ? 'selected' : '' }}>Đã giải quyết</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>