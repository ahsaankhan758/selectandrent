<script src="{{asset('/')}}assets/Js/admin/permissions.js"></script>
<div class="form-group">
    <label for="name">{{ ucfirst($role) }}</label>
    <select id="getUserName" name="name" class="form-control">
        <option value="" disabled selected>Select</option>
        @foreach ($usersList as $user)
            <option value={{ $user->id }}>{{ $user->name }}</option>
        @endforeach
    </select>
</div>