export type Post = {
    id: number;
    user_id: number;
    title: string;
    slug: string;
    content: string;
    published_at: string | null;
    created_at: string;
    updated_at: string;
    [key: string]: unknown;
};

export type Tag = {
    user: User;
};

export type TwoFactorConfigContent = {
    title: string;
    description: string;
    buttonText: string;
};
