<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Buku Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-4 text-gray-700">Daftar Buku Tersedia</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                                <th class="border border-gray-300 p-3">Kode Buku</th>
                                <th class="border border-gray-300 p-3">Judul Buku</th>
                                <th class="border border-gray-300 p-3">Pengarang</th>
                                <th class="border border-gray-300 p-3">Penerbit</th>
                                <th class="border border-gray-300 p-3">Stok</th>
                                <th class="border border-gray-300 p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse ($bukus as $buku)
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 p-3 font-mono text-xs">{{ $buku->kode_buku }}</td>
                                    <td class="border border-gray-300 p-3 font-semibold">{{ $buku->judul }}</td>
                                    <td class="border border-gray-300 p-3">{{ $buku->pengarang }}</td>
                                    <td class="border border-gray-300 p-3">{{ $buku->penerbit }}</td>
                                    <td class="border border-gray-300 p-3 font-semibold text-center">{{ $buku->stok }}</td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        @if ($buku->stok > 0)
                                            <button onclick="alert('Permintaan peminjaman buku {{ $buku->judul }} berhasil diajukan!')" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-1.5 px-3 rounded text-xs shadow">
                                                Pinjam Buku
                                            </button>
                                        @else
                                            <span class="text-xs text-red-500 font-semibold italic">Stok Habis</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-300 p-4 text-center text-gray-500">Belum ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>