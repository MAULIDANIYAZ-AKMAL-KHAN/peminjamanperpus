<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Data Anggota (User & Admin)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem;">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937;">Daftar Anggota</h3>
                        <p style="font-size: 0.75rem; color: #6b7280;">Kelola data pengguna sistem perpustakaan</p>
                    </div>
                    
                    <a href="{{ route('admin.user.create') }}" style="background-color: #059669; color: #ffffff; font-weight: 600; padding: 8px 16px; border-radius: 6px; font-size: 0.875rem; text-decoration: none; display: inline-block;">
                        + Tambah Anggota
                    </a>
                </div>

                @if(session('success'))
                    <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 1rem; font-size: 0.875rem;">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div style="background-color: #fee2e2; color: #991b1b; padding: 12px; border-radius: 6px; margin-bottom: 1rem; font-size: 0.875rem;">{{ session('error') }}</div>
                @endif

                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #e5e7eb; font-size: 0.875rem; text-align: left;">
                        <thead>
                            <tr style="background-color: #f3f4f6; color: #374151; font-size: 0.75rem; text-transform: uppercase;">
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">NO</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px;">NAMA</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px;">EMAIL</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">ROLE</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $usr)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center; font-family: monospace; font-size: 0.75rem;">{{ $index + 1 }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 12px; font-weight: 600; color: #1f2937;">{{ $usr->name }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 12px; color: #4b5563; font-family: monospace; font-size: 0.75rem;">{{ $usr->email }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">
                                    <span style="font-size: 0.75rem; font-weight: 600; color: {{ $usr->role === 'admin' ? '#4f46e5' : '#2563eb' }};">
                                        {{ ucfirst($usr->role) }}
                                    </span>
                                </td>
                                <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">
                                    <div style="display: flex; justify-content: center; gap: 4px;">
                                        <a href="{{ route('admin.user.edit', $usr->id) }}" style="background-color: #f59e0b; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 4px; text-decoration: none;">Edit</a>
                                        <form action="{{ route('admin.user.destroy', $usr->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #e11d48; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 4px; border: none; cursor: pointer;">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="padding: 16px; text-align: center; color: #6b7280;">Belum ada data anggota.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>