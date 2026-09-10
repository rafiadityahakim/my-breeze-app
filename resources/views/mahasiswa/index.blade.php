<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">TTL</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">JK</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Prodi</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">No. HP</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($mahasiswa as $item)
                                <tr>
                                    <td class="px-4 py-2 text-sm">{{ $item->nim }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->nama_mahasiswa }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->jenis_kelamin }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->program_studi }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->nomor_hp }}</td>
                                    <td class="px-4 py-2 text-sm">{{ $item->email }}</td>
                                    <td class="px-4 py-2 text-sm text-center">
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswa->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>