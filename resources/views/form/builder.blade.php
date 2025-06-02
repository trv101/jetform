@extends('layouts.app')

@section('content')
<div x-data="formBuilder()" x-init="init()" class="flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white px-4 py-6 overflow-y-auto">
        <h3 class="text-md font-bold mb-4">Form Elements</h3>
        <div x-ref="sidebar" class="space-y-2">
            <template x-for="field in availableFields" :key="field.label">
                <div class="bg-gray-700 px-3 py-2 rounded cursor-pointer hover:bg-gray-600"
                    :data-field="JSON.stringify(field)"
                    @click="addField(field)">
                    <span x-text="field.label"></span>
                </div>
            </template>
        </div>
        <div class="mt-6">
            <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700" @click="addPage">+ Add Page</button>
        </div>
    </div>

    <!-- Builder Canvas -->
    <div class="flex-1 flex flex-col bg-gray-50">
        
        <div class="flex justify-between items-center px-6 py-4 border-b bg-white shadow">
            <h2 class="text-lg font-bold text-blue-900">Form Builder - Page <span x-text="currentPageIndex + 1"></span></h2>
            <div class="space-x-2">
                <button x-show="currentPageIndex > 0" @click="prevPage" class="px-3 py-1 bg-gray-300 rounded">Back</button>
                <button x-show="currentPageIndex < pages.length - 1" @click="nextPage" class="px-3 py-1 bg-gray-300 rounded">Next</button>
                <button @click="saveForm" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </div>
        <!-- Logo Upload -->
<div class="p-6 border-b bg-white shadow flex flex-col items-center justify-center text-center">
    <template x-if="!logoUrl">
        <label for="logoUpload" class="text-blue-600 hover:underline cursor-pointer text-sm mb-2">+ Add your logo</label>
    </template>

    <template x-if="logoUrl">
        <div class="relative mb-2">
            <img :src="logoUrl" alt="Logo" class="h-20 object-contain" />
            <button @click="removeLogo" class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700">✕</button>
        </div>
    </template>

    <input id="logoUpload" type="file" accept="image/*" @change="uploadLogo" class="hidden">
</div>

        <div class="p-6 border-b bg-white shadow">
    <input type="text"
           x-model="formTitle"
           class="block w-full text-2xl font-bold text-gray-800 border-none focus:ring-0 mb-1"
           placeholder="Form Title">

    <input type="text"
           x-model="formSubtitle"
           class="block w-full text-sm text-gray-500 border-none focus:ring-0"
           placeholder="Type a subheader">
</div>

        <!-- Dropzone -->
        <div class="p-6 overflow-auto flex-1" x-ref="dropzone">
            <template x-for="(field, index) in pages[currentPageIndex].fields" :key="index">
                <div class="p-4 mb-4 border rounded bg-white shadow relative">
                    <div class="absolute top-2 right-2 text-sm text-red-500 cursor-pointer" @click="removeField(index)">&times;</div>
                    <label class="block font-medium text-gray-700" x-text="field.label"></label>
                    <template x-if="field.type === 'text'">
                        <input type="text" class="mt-1 w-full border rounded px-2 py-1" placeholder="Enter text">
                    </template>
                    <template x-if="field.type === 'textarea'">
                        <textarea class="mt-1 w-full border rounded px-2 py-1" placeholder="Enter details..."></textarea>
                    </template>
                    <template x-if="field.type === 'email'">
                        <input type="email" class="mt-1 w-full border rounded px-2 py-1" placeholder="Enter email">
                    </template>
                    <template x-if="field.type === 'number'">
                        <input type="number" class="mt-1 w-full border rounded px-2 py-1">
                    </template>
                    <template x-if="field.type === 'dropdown'">
                        <select class="mt-1 w-full border rounded px-2 py-1">
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </template>
                    <template x-if="field.type === 'checkbox'">
                        <div><input type="checkbox"> Option</div>
                    </template>
                    <template x-if="field.type === 'radio'">
                        <div><input type="radio"> Option</div>
                    </template>
                    <template x-if="field.type === 'date'">
                        <input type="date" class="mt-1 w-full border rounded px-2 py-1">
                    </template>
                    <template x-if="field.type === 'file'">
                        <input type="file" class="mt-1 w-full border rounded px-2 py-1">
                    </template>
                    <template x-if="field.type === 'submit'">
                        <button class="bg-green-600 text-white px-4 py-2 rounded mt-2">Submit</button>
                    </template>
                </div>
            </template>
            <div x-show="pages[currentPageIndex].fields.length === 0" class="text-center text-gray-400 mt-10">Click or drag elements from the left to add fields</div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
function formBuilder() {
    return {
        formTitle: 'Form Title',
        formSubtitle: 'Type a subheader',
        logoUrl: '',
        
        pages: [{ fields: [] }],
        currentPageIndex: 0,

        availableFields: [
            { type: 'text', label: 'Short Text' },
            { type: 'textarea', label: 'Long Text' },
            { type: 'paragraph', label: 'Paragraph' },
            { type: 'dropdown', label: 'Dropdown' },
            { type: 'radio', label: 'Single Choice' },
            { type: 'checkbox', label: 'Multiple Choice' },
            { type: 'number', label: 'Number' },
            { type: 'image', label: 'Image' },
            { type: 'file', label: 'File Upload' },
            { type: 'date', label: 'Date Picker' },
            { type: 'submit', label: 'Submit Button' }
        ],

        init() {
            const sidebar = this.$refs.sidebar;
            const dropzone = this.$refs.dropzone;

            Sortable.create(sidebar, {
                group: { name: 'formBuilder', pull: 'clone', put: false },
                sort: false,
                animation: 150,
                fallbackOnBody: true,
                removeOnClone: false
            });

            Sortable.create(dropzone, {
                group: { name: 'formBuilder', pull: true, put: true },
                animation: 150,
                onAdd: evt => {
                    const rawData = evt.item.getAttribute('data-field');
                    const newField = JSON.parse(rawData);
                    this.pages[this.currentPageIndex].fields.splice(evt.newIndex, 0, { ...newField });
                    evt.item.remove();
                },
                onEnd: evt => {
                    if (evt.from === evt.to) {
                        const moved = this.pages[this.currentPageIndex].fields.splice(evt.oldIndex, 1)[0];
                        this.pages[this.currentPageIndex].fields.splice(evt.newIndex, 0, moved);
                    }
                }
            });
        },

        addField(field) {
            this.pages[this.currentPageIndex].fields.push({ ...field });
        },

        removeField(index) {
            this.pages[this.currentPageIndex].fields.splice(index, 1);
        },

        addPage() {
            this.pages.push({ fields: [] });
            this.currentPageIndex = this.pages.length - 1;
        },

        nextPage() {
            if (this.currentPageIndex < this.pages.length - 1) {
                this.currentPageIndex++;
            }
        },

        prevPage() {
            if (this.currentPageIndex > 0) {
                this.currentPageIndex--;
            }
        },

        uploadLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    this.logoUrl = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        removeLogo() {
            this.logoUrl = '';
            document.getElementById('logoUpload').value = '';
        },


        saveForm() {
            const formData = {
                logo: this.logoUrl,
                title: this.formTitle,
                subtitle: this.formSubtitle,
                pages: this.pages
            };
            console.log("Saved form:", JSON.stringify(formData));
        }

    };
}
</script>

<style>
.sortable-ghost {
    opacity: 0.4;
    background-color: #d0ebff;
}
</style>
@endsection
