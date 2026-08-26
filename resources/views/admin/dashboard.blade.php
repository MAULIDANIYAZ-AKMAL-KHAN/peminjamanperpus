<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Banner Selamat Datang -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #3b82f6;">
                <h3 style="font-size: 1.125rem; font-weight: 700; color: #111827;">
                    Selamat datang, {{ Auth::user()->name }}! 👍
                </h3>
                <p style="font-size: 0.875rem; color: #4b5563; margin-top: 0.25rem;">
                    Anda login sebagai <span style="font-weight: 600; color: #3b82f6;">Admin</span>. Anda memiliki akses penuh untuk mengelola sistem perpustakaan.
                </p>
            </div>

            <!-- Card Kelola Data Buku -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #2563eb; display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <div>
                    <h4 style="font-weight: 700; color: #1f2937; font-size: 1rem;">Kelola Data Buku</h4>
                    <p style="font-size: 0.75rem; color: #6b7280;">Koleksi buku perpustakaan.</p>
                </div>
                <a href="{{ route('admin.buku.index') }}" style="background-color: #2563eb; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                    Kelola &rarr;
                </a>
            </div>

            <!-- Card Kelola Data Anggota -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #059669; display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <div>
                    <h4 style="font-weight: 700; color: #1f2937; font-size: 1rem;">Kelola Data Anggota</h4>
                    <p style="font-size: 0.75rem; color: #6b7280;">Kelola akun (Siswa & Admin).</p>
                </div>
                <a href="{{ route('admin.user.index') }}" style="background-color: #059669; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                    Kelola &rarr;
                </a>
            </div>

            <!-- Card Peminjaman Buku -->
            <div style="background-color: #ffffff; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #d97706; display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <div>
                    <h4 style="font-weight: 700; color: #1f2937; font-size: 1rem;">Peminjaman Buku</h4>
                    <p style="font-size: 0.75rem; color: #6b7280;">Catat pinjam & kembali.</p>
                </div>
                <a href="{{ route('admin.peminjaman.index') }}" style="background-color: #d97706; color: #ffffff; font-size: 0.75rem; font-weight: 600; padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-block;">
                    Kelola &rarr;
                </a>
            </div>

        </div>
    </div>
</x-app-layout>