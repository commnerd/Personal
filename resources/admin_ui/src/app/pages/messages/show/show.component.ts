import { Component, OnInit } from '@angular/core';
import { first, Observable } from "rxjs";
import { ActivatedRoute } from "@angular/router";
import { ContactMessage } from "@interfaces/contact-message";
import { ContactMessageService } from "@services/models/contact-message.service";

@Component({
  selector: 'app-show',
  templateUrl: './show.component.html',
  styleUrls: ['./show.component.scss']
})
export class ShowComponent implements OnInit {
  message$!: Observable<ContactMessage | null>;

  constructor(
    private contactMessageService: ContactMessageService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.message$ = this.contactMessageService.get(params['id'] as number);
    });
  }
}
