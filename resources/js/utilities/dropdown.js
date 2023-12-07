export function toggleDropdown(dropdown) {
  const dropdownMenu = dropdown.getElementsByClassName("dropdown__menu")[0];
  dropdownMenu.classList.toggle('hidden');
}