import { ReactNode, ChangeEvent } from 'react';

// Tipos principales del proyecto
export interface User {
  id: number;
  name: string;
  email: string;
  email_verified_at?: string;
  created_at: string;
  updated_at: string;
}

export interface Product {
  id: number;
  name: string;
  description: string;
  price: number;
  image?: string;
  category: string;
  featured?: boolean;
  available?: boolean;
}

export interface Review {
  id: number;
  user_id: number;
  rating: number;
  comment: string;
  status: 'pending' | 'approved' | 'rejected';
  created_at: string;
  updated_at: string;
  user?: User;
}

export interface Order {
  id: number;
  user_id: number;
  total: number;
  status: 'pending' | 'processing' | 'completed' | 'cancelled';
  items: OrderItem[];
  created_at: string;
  updated_at: string;
}

export interface OrderItem {
  id: number;
  order_id: number;
  product_id: number;
  quantity: number;
  price: number;
  product?: Product;
}

export interface CartItem {
  product: Product;
  quantity: number;
}

export interface ApiResponse<T> {
  data: T;
  message?: string;
  status: 'success' | 'error';
}

export interface AuthState {
  user: User | null;
  isAuthenticated: boolean;
  isLoading: boolean;
}

export interface CartState {
  items: CartItem[];
  total: number;
  itemCount: number;
}

export interface ReviewState {
  reviews: Review[];
  isLoading: boolean;
  error: string | null;
}

// Props para componentes
export interface ComponentProps {
  children?: ReactNode;
  className?: string;
}

export interface ButtonProps extends ComponentProps {
  variant?: 'primary' | 'secondary' | 'outline' | 'ghost';
  size?: 'sm' | 'md' | 'lg';
  disabled?: boolean;
  loading?: boolean;
  onClick?: () => void;
  type?: 'button' | 'submit' | 'reset';
}

export interface InputProps extends ComponentProps {
  type?: string;
  placeholder?: string;
  value?: string;
  name?: string;
  required?: boolean;
  disabled?: boolean;
  error?: string;
  label?: string;
  onChange?: (e: ChangeEvent<HTMLInputElement>) => void;
}

export interface ModalProps extends ComponentProps {
  isOpen: boolean;
  onClose: () => void;
  title?: string;
  size?: 'sm' | 'md' | 'lg' | 'xl';
}

export interface ProductCardProps extends ComponentProps {
  product: Product;
  onAddToCart?: (product: Product) => void;
  showAddToCart?: boolean;
}

export interface ReviewCardProps extends ComponentProps {
  review: Review;
  showUser?: boolean;
}

// Tipos para formularios
export interface LoginFormData {
  email: string;
  password: string;
  remember?: boolean;
}

export interface RegisterFormData {
  name: string;
  email: string;
  password: string;
  password_confirmation: string;
}

export interface ReviewFormData {
  rating: number;
  comment: string;
}

// Tipos para navegación
export interface NavItem {
  label: string;
  href: string;
  icon?: ReactNode;
  active?: boolean;
}

export interface BreadcrumbItem {
  label: string;
  href?: string;
} 