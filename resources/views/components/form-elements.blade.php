<div class="w-64 bg-white border-r px-4 py-6 overflow-y-auto hidden lg:block">
    <h3 class="text-md font-bold text-gray-700 mb-4">Form Elements</h3>

    <div x-ref="sidebar" class="space-y-4">
    <template x-for="field in availableFields" :key="field.label">
        <div
            class="w-full bg-gray-50 border p-2 rounded shadow-sm cursor-pointer hover:bg-gray-100 transition"
            :data-field="JSON.stringify(field)"
            @click="addField(field)">
            <span x-text="field.label" class="text-sm font-medium text-gray-800"></span>
        </div>
    </template>
</div>

</div>
