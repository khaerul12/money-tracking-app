<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Tracker</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container {
            margin-top: 20px;
        }
        .btn-primary {
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<<body>
    <div class="container mt-5">
        <h1>Edit Transaction</h1>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col">
                    <input type="date" name="tanggal" class="form-control" placeholder="{{ $transaction->tanggal }}" required>
                </div>  
                <div class="col">
                    <input type="text" name="description" class="form-control" value="{{ $transaction->description }}" required>
                </div>
                <div class="col">
                    <input type="number" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
                </div>
                <div class="col">
                    <select name="type" class="form-control" required>
                        <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                        <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Update Transaction</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
</html>