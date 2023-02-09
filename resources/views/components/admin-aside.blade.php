
<h4 class="font-semibold mb-4"> Links </h4>
    <ul>
        <li>
            <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All posts </a>
        </li>
        <li>
            <a href="/admin/users" class="{{ request()->is('admin/users') ? 'text-blue-500' : '' }}">All users </a>
        </li>
        <li>
            <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : ''}}"> New post </a>
        </li>
    </ul>