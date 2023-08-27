<div id="input-container">
    <div class="input-row">
        <input type="text" name="input[]" placeholder="Enter something">
        <button class="remove-btn">Remove</button>
    </div>
</div>
<button id="add-btn">Add Row</button>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addMedicineBtn = document.getElementById('addBtn');
        const form = document.getElementById('prescForm');
    
        addMedicineBtn.addEventListener('click', function() {
            const newMedicineRow = document.createElement('div');
            newMedicineRow.classList.add('medicine-row');
            newMedicineRow.innerHTML = `
                <input type="text" name="medicine_name[]" placeholder="Medicine Name">
                <input type="text" name="frequency[]" placeholder="Frequency">
                <button class="remove-btn">-</button>
            `;
            form.appendChild(newMedicineRow);
        });
    
        form.addEventListener('click', function(event) {
            if (event.target.classList.contains('removeBtn')) {
                event.target.closest('.medicine-row').remove();
            }
        });
    });
    </script>
@endsection