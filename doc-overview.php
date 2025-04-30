<!-- Document Actions -->
<div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">My Documents</h2>
                <div class="flex space-x-4">
                    <a href="upload.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                        Upload
                    </a>
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        New Folder
                    </button>
                    <button class="px-4 py-2 border border-gray-200 rounded-lg hover:bg-gray-50 flex items-center">
                        Sort By
                    </button>
                </div>
            </div>

            <!-- Document Grid -->
            <div class="grid grid-cols-4 gap-6 mb-8">
                <!-- Document Item -->
                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <button class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-medium mb-1">project-report.pdf</h3>
                    <p class="text-sm text-gray-500">Last modified 2h ago</p>
                    <p class="text-sm text-gray-500">2.4 MB</p>
                </div>

                <!-- More document items... -->
            </div>