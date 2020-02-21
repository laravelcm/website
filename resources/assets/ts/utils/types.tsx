export type User = {
  id: number;
  picture: string;
  full_name: string;
  username: string;
  email: string;
  isAdmin: boolean;
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
  best_reply_id: number | null;
  channel: ChannelType;
  creator: User;
  last_reply: ReplyType | null;
  created_at: Date;
  updated_at: Date;
  replies: ReplyType[];
}

export type ReplyType = {
  id: number;
  body: string;
  thread: ThreadType;
  owner: User;
  favorites: string[];
  created_at: Date;
  updated_at: Date;
}
