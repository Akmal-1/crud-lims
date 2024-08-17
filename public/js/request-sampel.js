// public/js/request-sampel.js
document.addEventListener('DOMContentLoaded', function () {
    const addSampleBtn = document.getElementById('addSampleBtn');
    const sampleTable = document.getElementById('sampleTable').getElementsByTagName('tbody')[0];

    addSampleBtn.addEventListener('click', function (event) {
        event.preventDefault();

        // Buat baris baru
        const newRow = sampleTable.insertRow();

        // Date cell
        const dateCell = newRow.insertCell(0);
        const dateInput = document.createElement('input');
        dateInput.type = 'date';
        dateInput.className = 'form-control';
        dateInput.name = 'date[]';
        dateInput.required = true;
        dateCell.appendChild(dateInput);

        // Tipe Sampel cell
        const typeSampleCell = newRow.insertCell(1);
        const typeSampleSelect = document.createElement('select');
        typeSampleSelect.className = 'form-select';
        typeSampleSelect.name = 'type_sample[]';
        typeSampleSelect.required = true;
        typeSampleSelect.innerHTML = `
            <option value="DMT Line 1">DMT Line 1</option>
            <option value="DMT Line 2">DMT Line 2</option>
            <option value="DMT Line 3">DMT Line 3</option>
            <option value="DMT Line 4">DMT Line 4</option>
            <option value="DMT Line 5">DMT Line 5</option>
            <option value="DMT Line 6">DMT Line 6</option>
            <option value="DMT Line 7">DMT Line 7</option>
            <option value="DMT Line 8">DMT Line 8</option>
            <option value="DMT Mixing">DMT Mixing</option>
            <option value="MTS Reaksi akhir">MTS Reaksi akhir</option>
            <option value="MTS Settle">MTS Settle</option>
            <option value="MTS Drying">MTS Drying</option>
            <option value="MTS Filtrasi">MTS Filtrasi</option>
            <option value="MTS Sir. storage">MTS Sir. storage</option>
            <option value="MTS Drumming">MTS Drumming</option>
        `;
        typeSampleCell.appendChild(typeSampleSelect);

        // Batch/Lot cell
        const batchLotCell = newRow.insertCell(2);
        const batchLotInput = document.createElement('input');
        batchLotInput.type = 'text';
        batchLotInput.className = 'form-control';
        batchLotInput.name = 'batch_lot[]';
        batchLotInput.placeholder = 'Input Batch/Lot';
        batchLotInput.required = true;
        batchLotCell.appendChild(batchLotInput);

        // Deskripsi cell
        const descriptionCell = newRow.insertCell(3);
        const descriptionInput = document.createElement('textarea');
        descriptionInput.className = 'form-control';
        descriptionInput.name = 'description[]';
        descriptionInput.placeholder = 'Tambahkan Deskripsi Jika ada';
        descriptionCell.appendChild(descriptionInput);

        // Nama cell
        const nameCell = newRow.insertCell(4);
        const nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.className = 'form-control';
        nameInput.name = 'name[]';
        nameInput.placeholder = 'Nama operator / Staff';
        nameInput.required = true;
        nameCell.appendChild(nameInput);

        // Timestamp cell
        const timestampCell = newRow.insertCell(5);
        timestampCell.className = 'timestamp';
        timestampCell.textContent = 'Auto';

        // Delete Button
        const deleteCell = newRow.insertCell(6);
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = 'Hapus';
        deleteBtn.className = 'btn btn-danger btn-delete';
        deleteBtn.type = 'button';
        deleteBtn.addEventListener('click', function () {
            newRow.remove();
        });
        deleteCell.appendChild(deleteBtn);
    });
});
