<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('customers.index') }}"
       class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
        <p>Customers</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('withdraws.index') }}"
       class="nav-link {{ Request::is('withdraws*') ? 'active' : '' }}">
        <p>Withdraws</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('withdrawLogs.index') }}"
       class="nav-link {{ Request::is('withdrawLogs*') ? 'active' : '' }}">
        <p>Withdraw Logs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('deposits.index') }}"
       class="nav-link {{ Request::is('deposits*') ? 'active' : '' }}">
        <p>Deposits</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('depositDetails.index') }}"
       class="nav-link {{ Request::is('depositDetails*') ? 'active' : '' }}">
        <p>Deposit Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('gameTypes.index') }}"
       class="nav-link {{ Request::is('gameTypes*') ? 'active' : '' }}">
        <p>Game Types</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('gameDetails.index') }}"
       class="nav-link {{ Request::is('gameDetails*') ? 'active' : '' }}">
        <p>Game Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cryptos.index') }}"
       class="nav-link {{ Request::is('cryptos*') ? 'active' : '' }}">
        <p>Cryptos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('cryptoPrices.index') }}"
       class="nav-link {{ Request::is('cryptoPrices*') ? 'active' : '' }}">
        <p>Crypto Prices</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('depositTickets.index') }}"
       class="nav-link {{ Request::is('depositTickets*') ? 'active' : '' }}">
        <p>Deposit Tickets</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('depositTicketDetails.index') }}"
       class="nav-link {{ Request::is('depositTicketDetails*') ? 'active' : '' }}">
        <p>Deposit Ticket Details</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('withdrawTickets.index') }}"
       class="nav-link {{ Request::is('withdrawTickets*') ? 'active' : '' }}">
        <p>Withdraw Tickets</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tickets.index') }}"
       class="nav-link {{ Request::is('tickets*') ? 'active' : '' }}">
        <p>Tickets</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ticketLogs.index') }}"
       class="nav-link {{ Request::is('ticketLogs*') ? 'active' : '' }}">
        <p>Ticket Logs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('customerBalanceLogs.index') }}"
       class="nav-link {{ Request::is('customerBalanceLogs*') ? 'active' : '' }}">
        <p>Customer Balance Logs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
       <i class="nav-icon fa fa-user"></i> <p>Users</p>
    </a>
</li>
