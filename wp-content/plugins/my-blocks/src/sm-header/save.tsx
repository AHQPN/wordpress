import { useBlockProps } from '@wordpress/block-editor';

interface MenuItem { label: string; url: string; children: MenuItem[]; }

interface Attrs {
	logoUrl: string; logoWidth: number; siteName: string; menuItems: MenuItem[];
	bgColor: string; textColor: string;
	showSearch: boolean; showLocale: boolean; showStoreLocator: boolean; storeLocatorUrl: string;
	showAccount: boolean; showCart: boolean; stickyHeader: boolean;
}

export default function save() {
	return null;
}
