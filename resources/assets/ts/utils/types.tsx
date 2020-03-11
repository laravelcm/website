export type User = {
  id: number;
  picture: string;
  full_name: string;
  username: string;
  email: string;
  is_admin: boolean;
}

export type ChannelType = {
  id: number;
  name: string;
  slug: string;
}

export type ThreadType = {
  id: number;
  title: string;
  slug: string;
  replies_count: number;
  body: string;
  path: string;
  resume: string;
  visits: number;
  locked: boolean;
  isSubscribedTo: boolean;
  best_reply_id: number | null;
  channel: ChannelType;
  creator: User;
  last_reply: ReplyType | null;
  replies: ReplyType[];
  created_at: Date;
  updated_at: Date;
}

export type ReplyType = {
  id: number;
  body: string;
  thread: ThreadType;
  owner: User;
  isBest: boolean;
  isFavorited: boolean;
  favoritesCount: number;
  created_at: Date;
  updated_at: Date;
}

export type NotificationType = {
  id: number;
  type: string;
  data: {
    message: string;
    action: string;
    link: string;
  };
  read_at: Date;
  created_at: Date;
  updated_at: Date;
}

export type CategoryType = {
  id: number;
  name: string;
  slug: string;
}

export type PostType = {
  id: number;
  title: string;
  body: string;
  slug: string;
  status: string;
  summary: string;
  visits: number;
  image: string;
  creator?: User;
  propose?: User;
  category: CategoryType;
  created_at: Date;
  updated_at: Date;
}
