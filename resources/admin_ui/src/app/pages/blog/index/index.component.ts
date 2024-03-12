import { Component } from '@angular/core';
import { Observable } from "rxjs";
import { Paginated } from "@interfaces/laravel/paginated";
import { MatDialog } from "@angular/material/dialog";
import { PostService } from "@services/models/blog/post.service";
import { Post } from "@interfaces/blog/post";
import { ActivatedRoute, Params, Router } from "@angular/router";
import { PageEvent } from "@angular/material/paginator";
import {
  DeleteConfirmationDialogComponent
} from "@partials/delete-confirmation-dialog/delete-confirmation-dialog.component";

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent {
  models$ !: Observable<Paginated<Post> | null>;

  constructor(
    public dialog: MatDialog,
    private postService: PostService,
    private router: Router,
    private activatedRoute: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.activatedRoute.queryParams.subscribe((params: Params) => {
      let page = 1;
      if(typeof params['page'] !== 'undefined') {
        page = params['page'];
      }
      this.models$ = this.postService.list(page);
    });
  }

  addPost() {
    this.router.navigate(['blog', 'posts', 'create']);
  }

  editPost(post: Post) {
    this.router.navigate(['blog', 'posts', post.id, 'edit']);
  }

  switchPage(event: PageEvent) {
    this.router.navigateByUrl(`/blog/posts?page=${event.pageIndex + 1}`)
  }

  deletePost(post: Post) {
    let dialogSubscription = this.dialog
      .open(DeleteConfirmationDialogComponent)
      .afterClosed()
      .subscribe(confirmation => {
        if(confirmation) {
          let deleteSubscription = this.postService.delete(post.id!).subscribe(() => {
            this.ngOnInit();
            setTimeout(() => deleteSubscription.unsubscribe(), 0);
          });
        }
        setTimeout(() => dialogSubscription.unsubscribe(), 0);
      });
  }
}
