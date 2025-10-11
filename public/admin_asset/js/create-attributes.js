document.addEventListener('DOMContentLoaded', function () {
    // DOM Elements
    const attributeName = document.getElementById('attributeName');
    const attributeCode = document.getElementById('attributeCode');
    /*
    const attributeType = document.getElementById('attributeType');
    const valuesSection = document.getElementById('valuesSection');
    const colorOptionsSection = document.getElementById('colorOptionsSection');
    const valuesList = document.getElementById('valuesList');
    const colorsList = document.getElementById('colorsList');
    const emptyValuesState = document.getElementById('emptyValuesState');
    const emptyColorsState = document.getElementById('emptyColorsState');
    const newValueInput = document.getElementById('newValueInput');
    const addValueBtn = document.getElementById('addValueBtn');
    const newColorName = document.getElementById('newColorName');
    const newColorValue = document.getElementById('newColorValue');
    const addColorBtn = document.getElementById('addColorBtn');

    let attributeValues = [];
    let colorOptions = [];
*/
    // Auto-generate attribute code from name
    attributeName.addEventListener('input', function () {
        attributeCode.value = generateAttributeCode(this.value);
    });

    // Generate attribute code
    function generateAttributeCode(name) {
        return name
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '_')
            .replace(/^-+|-+$/g, '');
    }

    // Show/hide sections based on attribute type

    /*
    attributeType.addEventListener('change', function () {
        const type = this.value;

        // Hide all conditional sections first
        valuesSection.style.display = 'none';
        colorOptionsSection.style.display = 'none';

        // Show relevant sections
        if (['select', 'multiselect'].includes(type)) {
            valuesSection.style.display = 'block';
        } else if (type === 'color') {
            colorOptionsSection.style.display = 'block';
        }
    });
*/
    // Add value to attribute values

    /*
    addValueBtn.addEventListener('click', function () {
        const value = newValueInput.value.trim();
        if (value) {
            addAttributeValue(value);
            newValueInput.value = '';
            newValueInput.focus();
        }
    });
*/
    // Add value on Enter key
    /*
    newValueInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addValueBtn.click();
        }
    });
*/

    // Add color option
    /*
    addColorBtn.addEventListener('click', function () {
        const name = newColorName.value.trim();
        const color = newColorValue.value;

        if (name) {
            addColorOption(name, color);
            newColorName.value = '';
            newColorName.focus();
        }
    });
*/

    // Add attribute value
    /*
    function addAttributeValue(value) {
        const id = Date.now().toString();
        attributeValues.push({id, value});
        renderValuesList();
    }
*/

    // Add color option

    /*
    function addColorOption(name, color) {
        const id = Date.now().toString();
        colorOptions.push({id, name, color});
        renderColorsList();
    }
*/

    // Remove attribute value
    /*
    function removeAttributeValue(id) {
        attributeValues = attributeValues.filter(item => item.id !== id);
        renderValuesList();
    }
*/

    // Remove color option
    /*
    function removeColorOption(id) {
        colorOptions = colorOptions.filter(item => item.id !== id);
        renderColorsList();
    }
*/

    // Render values list
    /*
    function renderValuesList() {
        if (attributeValues.length === 0) {
            emptyValuesState.style.display = 'block';
            valuesList.innerHTML = '';
            return;
        }

        emptyValuesState.style.display = 'none';
        valuesList.innerHTML = attributeValues.map(item => `
                    <div class="value-item" data-id="${item.id}">
                        <span class="drag-handle">
                            <i class="fas fa-grip-vertical"></i>
                        </span>
                        <input class="value-text" readonly name="attribute_values[]" value="${item.value}">
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeAttributeValue('${item.id}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `).join('');
    }
*/

    // Render colors list
    /*
    function renderColorsList() {
        if (colorOptions.length === 0) {
            emptyColorsState.style.display = 'block';
            colorsList.innerHTML = '';
            return;
        }

        emptyColorsState.style.display = 'none';
        colorsList.innerHTML = colorOptions.map(item => `
                    <div class="value-item" data-id="${item.id}">
                        <span class="drag-handle">
                            <i class="fas fa-grip-vertical"></i>
                        </span>
                        <div class="swatch-preview">
                            <div class="color-preview" style="background-color: ${item.color};"></div>
                            <span>${item.name}</span>
                            <small class="text-muted">${item.color}</small>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeColorOption('${item.id}')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `).join('');
    }
*/

    // Make functions global for onclick handlers
    // window.removeAttributeValue = removeAttributeValue;
    // window.removeColorOption = removeColorOption;
});
