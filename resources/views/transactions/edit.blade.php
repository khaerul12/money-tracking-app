<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Transaction</h1>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
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