<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog & Peminjaman Buku Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Notifikasi Pesan -->
            @if(session('success'))
                <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Bagian 1: Daftar Katalog Buku Tersedia -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 1rem;">
                    📚 Daftar Katalog Buku Tersedia
                </h3>
                
                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #e5e7eb; font-size: 0.875rem; text-align: left;">
                        <thead>
                            <tr style="background-color: #f3f4f6; color: #374151;">
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Kode</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px;">Judul Buku</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px;">Pengarang</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px;">Penerbit</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Stok</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bukus as $buku)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center; font-family: monospace; font-weight: 500;">{{ $buku->kode_buku }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; font-weight: 600; color: #1f2937;">{{ $buku->judul }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; color: #4b5563;">{{ $buku->pengarang }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; color: #4b5563;">{{ $buku->penerbit }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center; font-weight: 600;">{{ $buku->stok }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">
                                    <form action="{{ route('user.pinjam') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                        <input type="hidden" name="tanggal_kembali" value="{{ date('Y-m-d', strtotime('+7 days')) }}">
                                        <button type="submit" style="background-color: #059669; color: #ffffff; font-weight: 600; padding: 6px 12px; border-radius: 4px; font-size: 0.875rem; border: none; cursor: pointer;">
                                            Pinjam
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="padding: 1rem; text-align: center; color: #6b7280;">Semua stok buku sedang kosong atau habis dipinjam.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bagian 2: Riwayat Peminjaman & Pengembalian Mandiri -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 1rem;">
                    📖 Riwayat Peminjaman Buku Saya
                </h3>
                
                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid #e5e7eb; font-size: 0.875rem; text-align: left;">
                        <thead>
                            <tr style="background-color: #f3f4f6; color: #374151;">
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">No</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px;">Judul Buku</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Tanggal Pinjam</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Batas Pengembalian</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Status</th>
                                <th style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $index => $r)
                            <tr style="border-bottom: 1px solid #e5e7eb;">
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center; font-family: monospace;">{{ $index + 1 }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; font-weight: 600; color: #1f2937;">{{ $r->buku->judul }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center; font-family: monospace;">{{ $r->tanggal_pinjam }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center; font-family: monospace;">{{ $r->tanggal_kembali }}</td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">
                                    <span style="padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; background-color: {{ $r->status === 'dipinjam' ? '#fef3c7' : '#d1fae5' }}; color: {{ $r->status === 'dipinjam' ? '#b45309' : '#047857' }};">
                                        {{ ucfirst($r->status) }}
                                    </span>
                                </td>
                                <td style="border: 1px solid #e5e7eb; padding: 10px; text-align: center;">
                                    @if($r->status === 'dipinjam')
                                        <form action="{{ route('user.kembali', $r->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" style="background-color: #2563eb; color: #ffffff; font-weight: 600; padding: 4px 10px; border-radius: 4px; font-size: 0.875rem; border: none; cursor: pointer;">
                                                Kembalikan
                                            </button>
                                        </form>
                                    @else
                                        <span style="color: #9ca3af; font-size: 0.875rem;">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="padding: 1rem; text-align: center; color: #6b7280;">Belum ada riwayat peminjaman buku.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>