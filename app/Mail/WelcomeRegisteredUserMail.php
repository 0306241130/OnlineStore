<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class WelcomeRegisteredUserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    // Khai báo biến public để truyền dữ liệu người dùng ra View
    public $user;
    /**
     * Hàm khởi tạo nhận vào đối tượng User vừa đăng ký
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Thiết lập Tiêu đề thư (Subject)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Chào mừng bạn gia nhập hệ thống của chúng tôi!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.auth.welcome',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
