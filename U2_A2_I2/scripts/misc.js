// Funciones miscelaneas JS
// César A. V. UnADM ES1521204253

function traceIfFalse(condition, msg) {
    if (!condition) {
        console.trace(msg);
    }
}

function getCtrl(id) {
    let ctrl = document.getElementById(id);

    traceIfFalse(ctrl, `no encontrado '${id}'`);

    return ctrl;
}

function selectedVal(select) {
    if (select) { // DropDown o hidden
        return (select.selectedIndex &&
                 select.selectedIndex !== -1) ?
                 select.options[select.selectedIndex].value : select.value;
    }

    return null;
}

function selectOption(select, val) {
    if (select && select.options) {
        let a = Array.from(select.options);
        let idx = a.findIndex((o) => o.value == val)
        if (idx != -1) {
            // asegurar que está habilitado
            select.options[idx].disabled = false;
            select.selectedIndex = idx;
        }

        traceIfFalse(idx != -1, `'${val}' no encontrado en '${select.name}'`)
        return idx;
    }
}

function initBSTooltips() {
    window.addEventListener('load', () => {
        // https://getbootstrap.com/docs/5.3/components/tooltips/
        console.log('Inicializar tooltips');
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    });
}