
import '../css/app.scss';
import '../css/styles.css';

import {Dropdown} from "bootstrap";

const enableDropdown = () => {
    const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    dropdownElementList.map(function (dropdownToggleEl) {
        return new Dropdown(dropdownToggleEl)
    });
}