<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Anggota Baru') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem;">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Password</label>
                        <input type="password" name="password" class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Role / Hak Akses</label>
                        <select name="role" class="border-gray-300 rounded-md shadow-sm w-full" required>
                            <option value="user">User / Siswa</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem;">
                        <button type="submit" style="background-color: #2563eb; color: #ffffff; font-weight: 600; padding: 8px 16px; border-radius: 6px; font-size: 14px; border: none; cursor: pointer; display: inline-block;">
                            Simpan Anggota
                        </button>
                        <a href="{{ route('admin.user.index') }}" style="color: #4b5563; font-size: 14px; text-decoration: underline;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>