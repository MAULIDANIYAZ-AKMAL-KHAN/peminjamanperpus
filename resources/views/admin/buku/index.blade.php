<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem;">
                
                @if (session('success'))
                    <div style="background-color: #d1fae5; color: #065f46; padding: 12px; border-radius: 6px; margin-bottom: 1rem; font-size: 0.875rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <div>
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937;">Koleksi Buku</h3>
                        <p style="font-size: 0.75rem; color: #6b7280;">Kelola daftar buku perpustakaan yang tersedia</p>
                    </div>
                    
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <a href="{{ route('admin.buku.create') }}" style="background-color: #2563eb; color: #ffffff; font-weight: 600; padding: 8px 16px; border-radius: 6px; font-size: 0.875rem; text-decoration: none; display: inline-block;">
                            + Tambah Buku
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #e5e7eb; font-size: 0.875rem; text-align: left;">
                        <thead>
                            <tr style="background-color: #f3f4f6; color: #374151; font-size: 0.75rem; text-transform: uppercase;">
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">KODE BUKU</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px;">JUDUL</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px;">PENGARANG</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px;">PENERBIT</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">STOK</th>
                                <th style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bukus as $buku)
                                <tr style="border-bottom: 1px solid #e5e7eb;">
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center; font-family: monospace; font-size: 0.75rem;">{{ $buku->kode_buku }}</td>
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; font-weight: 600; color: #1f2937;">{{ $buku->judul }}</td>
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; color: #4b5563;">{{ $buku->pengarang }}</td>
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; color: #4b5563;">{{ $buku->penerbit }}</td>
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center; font-weight: 600;">{{ $buku->stok }}</td>
                                    <td style="border: 1px solid #e5e7eb; padding: 12px; text-align: center;">
                                        @if (Auth::check() && Auth::user()->role === 'admin')
                                            <div style="display: flex; justify-content: center; gap: 4px;">
                                                <a href="{{ route('admin.buku.edit', $buku->id) }}" style="background-color: #f59e0b; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 4px; text-decoration: none;">Edit</a>
                                                <form action="{{ route('admin.buku.destroy', $buku->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: #e11d48; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 4px; border: none; cursor: pointer;">Hapus</button>
                                                </form>
                                            </div>
                                        @else
                                            @if ($buku->stok > 0)
                                                <button onclick="alert('Permintaan pinjam buku berhasil diajukan!')" style="background-color: #4f46e5; color: #ffffff; font-weight: 600; padding: 4px 12px; border-radius: 4px; font-size: 0.75rem; border: none; cursor: pointer;">
                                                    Pinjam Buku
                                                </button>
                                            @else
                                                <span style="font-size: 0.75rem; color: #ef4444; font-style: italic; font-weight: 600;">Stok Habis</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 16px; text-align: center; color: #6b7280;">Belum ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>