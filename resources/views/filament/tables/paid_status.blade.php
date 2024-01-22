@if ($getRecord()->is_paid)
    <x-badge label="PAID" positive icon="cash" />
@else
    <x-badge label="PENDING" warning icon="cash" />
@endif
