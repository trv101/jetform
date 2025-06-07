@extends('layouts.app')

@section('content')
<div x-data="formBuilder({ formId: '{{ $form->id }}', schema: @js($form->schema) })"

     x-init="init()"
     class="flex h-screen overflow-hidden">

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

    <!-- Main Builder Area -->
    <div class="flex-1 overflow-y-auto bg-gray-100">
        <div class="max-w-3xl mx-auto p-6">

            <!-- Top Controls -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-bold text-blue-900">Form Builder - Page <span x-text="currentPageIndex + 1"></span></h2>
                <div class="space-x-2">
                    <button x-show="currentPageIndex > 0" @click="prevPage" class="px-3 py-1 bg-gray-300 rounded">Back</button>
                    <button x-show="currentPageIndex < pages.length - 1" @click="nextPage" class="px-3 py-1 bg-gray-300 rounded">Next</button>
                    <button @click="saveForm" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
                </div>
            </div>

            <!-- Logo Upload -->
            <div class="text-center mb-6">
                <template x-if="!logoUrl">
                    <label for="logoUpload" class="text-blue-600 hover:underline cursor-pointer text-sm">+ Add your logo</label>
                </template>
                <template x-if="logoUrl">
                    <div class="relative inline-block">
                        <img :src="logoUrl" alt="Logo" class="h-20 object-contain mx-auto" />
                        <button @click="removeLogo" class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700">✕</button>
                    </div>
                </template>
                <input id="logoUpload" type="file" accept="image/*" @change="uploadLogo" class="hidden">
            </div>

            <!-- Title + Subtitle -->
            <div class="mb-8">
                <input type="text"
                       x-model="formTitle"
                       class="block w-full text-2xl font-bold text-gray-800 border-none focus:ring-0 mb-1"
                       placeholder="Form Title">
                <input type="text"
                       x-model="formSubtitle"
                       class="block w-full text-sm text-gray-500 border-none focus:ring-0"
                       placeholder="Type a subheader">
            </div>

            <!-- Dropzone for Form Fields -->
        <div x-ref="dropzone">
            <template x-for="(field, index) in pages[currentPageIndex].fields" :key="index">

                <div class="relative mb-6 border border-gray-200 rounded bg-white px-4 py-4">
                    <div class="absolute top-2 right-2 text-sm text-red-500 cursor-pointer" @click="removeField(index)">&times;</div>

                    <!-- Heading -->
                    <template x-if="field.type === 'heading'">
                        <div>
                            <input type="text" x-model="field.heading" class="w-full text-2xl font-bold text-gray-800 border-none focus:ring-0 mb-1" placeholder="Heading">
                            <input type="text" x-model="field.subheading" class="w-full text-sm text-gray-500 border-none focus:ring-0" placeholder="Subheading">
                        </div>
                    </template>

                    <!-- Short Text -->
                    <template x-if="field.type === 'text'">
                        <div>
                            <input type="text" class="w-full text-sm font-semibold text-gray-700 border-none focus:ring-0 mb-2 placeholder:text-gray-400" placeholder="Type a question" />
                            <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" placeholder="" />
                        </div>
                    </template>

                    <!-- Long Text -->
                    <template x-if="field.type === 'textarea'">
                        <div>
                            <input type="text" class="w-full text-sm font-semibold text-gray-700 border-none focus:ring-0 mb-2 placeholder:text-gray-400" placeholder="Type a question" />
                            <textarea disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" rows="4"></textarea>
                        </div>
                    </template>

                    <!-- Full Name -->
                    <template x-if="field.type === 'fullname'">
                        <div>
                            <input type="text" class="w-full text-sm font-semibold text-gray-700 border-none focus:ring-0 mb-3 placeholder:text-gray-800" placeholder="Name" />
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" placeholder="First Name" />
                                    <p class="text-xs text-gray-500 mt-1">First Name</p>
                                </div>
                                <div class="flex-1">
                                    <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" placeholder="Last Name" />
                                    <p class="text-xs text-gray-500 mt-1">Last Name</p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Email -->
                    <template x-if="field.type === 'email'">
                        <div>
                            <input type="text" x-model="field.label" class="w-full text-sm font-semibold text-gray-700 border-none focus:ring-0 mb-2 placeholder:text-gray-400" placeholder="Email" />
                            <input type="email" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" />
                            <p class="text-xs text-gray-500 mt-1">example@example.com</p>
                        </div>
                    </template>

                    <!-- Address -->
                    <template x-if="field.type === 'address'">
                        <div>
                            <input type="text" x-model="field.label" class="w-full text-sm font-semibold text-gray-700 border-none focus:ring-0 mb-2 placeholder:text-gray-400" placeholder="Address" />
                            <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700 mb-1" />
                            <p class="text-xs text-gray-500 mb-2">Street Address</p>
                            <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700 mb-1" />
                            <p class="text-xs text-gray-500 mb-2">Street Address Line 2</p>
                            <div class="flex gap-4 mb-2">
                                <div class="flex-1">
                                    <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" />
                                    <p class="text-xs text-gray-500 mt-1">City</p>
                                </div>
                                <div class="flex-1">
                                    <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" />
                                    <p class="text-xs text-gray-500 mt-1">State / Province</p>
                                </div>
                            </div>
                            <input type="text" disabled class="w-full border border-gray-300 rounded px-3 py-2 text-sm text-gray-700" />
                            <p class="text-xs text-gray-500 mt-1">Postal / Zip Code</p>
                        </div>
                    </template>
                </div>
            </template>
            </div>

            <div x-show="pages[currentPageIndex].fields.length === 0" class="text-center text-gray-400 mt-10">
                Click or drag elements from the left to add fields
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
function formBuilder({ formId, schema }) {
    return {
formId,
        formTitle: 'Form Title',
        formSubtitle: 'Type a subheader',
        logoUrl: '',
        pages: [{ fields: [] }],
        currentPageIndex: 0,

        availableFields: [
            { type: 'fullname', label: 'Full Name' },
            { type: 'email', label: 'Email' },
            { type: 'address', label: 'Address' },
            { type: 'heading', label: 'Heading', heading: '', subheading: '' },
            { type: 'text', label: 'Short Text' },
            { type: 'textarea', label: 'Long Text' },
        ],

        init() {
        console.log("Form ID:", this.formId);

    const sidebar = this.$refs.sidebar;
    const dropzone = this.$refs.dropzone;

    // Sidebar for dragging (cloning)
    Sortable.create(sidebar, {
        group: {
            name: 'formBuilder',
            pull: 'clone',
            put: false
        },
        animation: 150,
        sort: false
    });

    // Dropzone for active page (reordering & adding)
    Sortable.create(dropzone, {
        group: {
            name: 'formBuilder',
            pull: true,
            put: true
        },
        animation: 150,
        onAdd: evt => {
            const rawData = evt.item.getAttribute('data-field');
            if (rawData) {
                const newField = JSON.parse(rawData);
                this.pages[this.currentPageIndex].fields.splice(evt.newIndex, 0, { ...newField });
                evt.item.remove();
            }
        },
        onUpdate: evt => {
            // This handles reordering existing fields
            const moved = this.pages[this.currentPageIndex].fields.splice(evt.oldIndex, 1)[0];
            this.pages[this.currentPageIndex].fields.splice(evt.newIndex, 0, moved);
        }
    });
}
,

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
    console.log("Saving to:", `/builder/${this.formId}`);
    fetch(`/builder/${this.formId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            schema: {
                logo: this.logoUrl,
                title: this.formTitle,
                subtitle: this.formSubtitle,
                pages: this.pages
            }
        })
    })
    .then(res => {
        if (!res.ok) throw new Error('Failed');
        return res.json();
    })
    .then(data => alert("Saved"))
    .catch(err => {
        console.error("Save failed:", err);
        alert("Failed to save form.");
    });
}
    }
}
</script>

<style>
.sortable-ghost {
    opacity: 0.4;
    background-color: #d0ebff;
}
</style>
@endsection

@section('hideFooter')
@endsection
